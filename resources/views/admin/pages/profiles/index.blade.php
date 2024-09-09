@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>

{{--    <div class="ms-2">--}}
{{--        <div class="btn btn-dark btn-lg btn-flat" data-toggle="modal" data-target="#modal-xl">--}}
{{--            <i class="fas fa-plus-square fa-lg mr-2"></i>Add New--}}
{{--        </div>--}}
{{--    </div>--}}

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning" title="Editar Perfil"><i class="fas fa-pencil-alt" aria-hidden="true"></i></i></a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning" title="Ver Perfil"><i class="fa fa-search" ></i></a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning" title="Add Permissões"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{$profiles->links()}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
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
                    <form action="{{ route('profiles.store') }}" class="form" method="POST">
                        @csrf
                        @include('admin.pages.profiles._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
