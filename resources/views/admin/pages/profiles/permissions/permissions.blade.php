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

    <h1>Permissões do perfil <strong> {{$profile->name}}</strong> </h1>
    <a href="{{ route('profiles.permissions.available',$profile->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO</a>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('profiles.edit', $permission->id) }}" class="btn btn-info">Edit</a>
{{--                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">VER</a>--}}
{{--                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>--}}
                                {{--                                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
{{--            @if (isset($filters))--}}
{{--                {!! $profiles->appends($filters)->links() !!}--}}
{{--            @else--}}
{{--                {!! $profiles->links() !!}--}}
{{--            @endif--}}
        </div>
    </div>

@stop
