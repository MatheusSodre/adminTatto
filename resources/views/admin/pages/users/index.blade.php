@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>

{{--    <div class="ms-2">--}}
{{--        <div class="btn btn-dark btn-lg btn-flat" data-toggle="modal" data-target="#modal-xl">--}}
{{--            <i class="fas fa-plus-square fa-lg mr-2"></i>Add New--}}
{{--        </div>--}}
{{--    </div>--}}

    <h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
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
                        <th>Perfil</th>
                        <th>Cnpj</th>
                        <th>Email</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @foreach ($user->profiles as $profile )
                                {{ $profile->name }}
                                @endforeach
                            </td>
                            <td class="cnpj">
                                {{ $user->cnpj }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('users.profiles', $user->id) }}" class="btn btn-warning" title="Add Perfil"><i class="fa fa-id-card " aria-hidden="true"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" title="Editar Usuário"><i class="fas fa-pencil-alt" aria-hidden="true"></i></i></a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning" title="Detalhes Usuário"><i class="fa fa-search" ></i></a>
                                <a href="{{ route('files.getFileUser', $user->id) }}" class="btn btn-warning" title="Arquivos Usuário"><i class="fa fa-file" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{$users->links()}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
        </div>
    </div>
@stop
