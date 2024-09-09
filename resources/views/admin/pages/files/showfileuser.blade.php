@extends('adminlte::page')

@section('title', 'Arquivos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('files.index') }}" class="active">Arquivos</a></li>
    </ol>
    <h1>Arquivos <a href="{{ route('attach.files.client', $idUser) }}" class="btn btn-dark">ADD</a></h1>
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
                        <th>Nome Arquivo</th>
                        <th>Tipo Documento</th>
                        <th>Serviços</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>
                                {{ $file->name }}
                            </td>
                            <td>
                                {{ $file->type->name }}
                            </td>
                            <td>
                                {{getStatusServicos($file->servicos)}}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('files.download', $file->id) }}" class="btn btn-warning"><i class="fas fa-download"></i></a>
                                <a href="{{ route('files.show', $file->id) }}" class="btn btn-warning"><i class="fa fa-search" ></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="card-footer">
            @if (isset($filters))
                {!! $file->appends($filters)->links() !!}
            @else
                {!! $file->links() !!}
            @endif
        </div> --}}
    </div>
@stop
