@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissões</a></li>
    </ol>
    <h1>Permissão <a href="{{ route('permissions.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning" title="Editar Permissões" ><i class="fas fa-pencil-alt" aria-hidden="true"></i></i></a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning" title="Ver Permissões"><i class="fa fa-search" ></i></a>
                                <a href="{{ route('permissions.profile', $permission->id) }}" class="btn btn-warning" title="Perfis"><i class="fa fa-id-card" aria-hidden="true"></i></a>
{{--                                <a href="{{ route('permissions.plans', permission->id) }}" class="btn btn-warning"><i class="fas fa-list-alt"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{$permissions->links()}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
        </div>
    </div>
@stop
