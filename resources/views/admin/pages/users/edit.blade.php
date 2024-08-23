@extends('adminlte::page')

@section('title', "Editar o Perfil {$user->name}")

@section('content_header')
    <h1>Editar o Perfil {{ $user->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
