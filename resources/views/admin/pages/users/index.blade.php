@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Clientes</a></li>
    </ol>

{{--    <div class="ms-2">--}}
{{--        <div class="btn btn-dark btn-lg btn-flat" data-toggle="modal" data-target="#modal-xl">--}}
{{--            <i class="fas fa-plus-square fa-lg mr-2"></i>Add New--}}
{{--        </div>--}}
{{--    </div>--}}

    <h1>Clientes <a href="{{ route('users.create') }}" class="btn btn-dark">ADD</a></h1>
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
                                {{ $user->cnpj }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo Perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" class="form" method="POST">
                        @csrf
                        @include('admin.pages.users._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
