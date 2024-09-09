@extends('adminlte::page')

@section('title', 'Arquivos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('files.index') }}" class="active">Files</a></li>
    </ol>

    @if (Gate::allows('ver-todos-arquivos'))
        <h1>Arquivos <a href="{{ route('files.create') }}" class="btn btn-dark">ADD</a></h1>
    @endif

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('files.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Permissão</th>
                        <th>Serviço</th>
                        <th>Documento</th>
                        <th>Data</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>
                                {{ $file->user->name }}
                            </td>
                            <td>
                                @foreach ($file->user->profiles as $profile)
                                {{ $profile->name }}
                                @endforeach
                            </td>
                            <td>
                                {{getStatusServicos($file->servicos)}}
                            </td>
                            <td>
                                {{ $file->type->name }}
                            </td>
                            <td>
                                {{ $file->data_arquivo }}
                            </td>
                            <td style="width: 10px;">
                                {{-- <a href="{{ route('files.destroy', $file->id) }}" class="btn btn-danger d-inline-block"><i class="fas fa-trash"></i></a> --}}
                                <a href="{{ route('files.download', $file->id) }}" class="btn btn-warning d-inline-block" title="Download"><i class="fa fa-download"></i></a>
                                <a href="{{ route('files.show', $file->id) }}" class="btn btn-warning d-inline-block" title="Ver Arquivo"><i class="fa fa-search"></i></a>
                                @if (Gate::allows('excluir-arquivos'))
                                    <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Excluir"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{$files->links()}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
        </div>
    </div>
@stop
{{-- <div class="card-tools">
<ul class="pagination pagination-sm">
<li class="page-item"><a href="#" class="page-link">«</a></li>
<li class="page-item"><a href="#" class="page-link">1</a></li>
<li class="page-item"><a href="#" class="page-link">2</a></li>
<li class="page-item"><a href="#" class="page-link">3</a></li>
<li class="page-item"><a href="#" class="page-link">»</a></li>
</ul>
</div> --}}
