@extends('adminlte::page')

@section('title', 'Arquivos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('files.index') }}" class="active">Files</a></li>
    </ol>
    <h1>Arquivos <a href="{{ route('files.create') }}" class="btn btn-dark">ADD</a></h1>
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
                        <th width="270">Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>
                                {{ $file->name }}
                            </td>
                            <td>
                                {{ $file->user->cnpj }}
                            </td>
                            <td>
                                {{ $file->user->email }}
                            </td>
                            <td>
                                {{ $file->type->name }}
                            </td>
                            <td>
                                {{ $file->data_arquivo }}
                            </td>
                            <td style="width: 10px;">
                                {{-- <a href="{{ route('files.destroy', $file->id) }}" class="btn btn-danger d-inline-block"><i class="fas fa-trash"></i></a> --}}
                                <a href="{{ route('files.download', $file->id) }}" class="btn btn-success d-inline-block"><i class="fa fa-download"></i></a>
                                <a href="{{ route('files.show', $file->id) }}" class="btn btn-warning d-inline-block"><i class="fa fa-search"></i></a>
                                <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {!! $files->links() !!}
            @endif
        </div>
    </div>
@stop
