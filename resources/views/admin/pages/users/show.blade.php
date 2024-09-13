@extends('adminlte::page')

@section('title', "Detalhes do perfil {$user->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $user->name }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $user->email }}
                </li>
                <li>
                    <strong>Cnpj: </strong> {{ $user->cnpj }}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('users.status', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="status" value="2" hidden>
                <input type="text" name="name" value="{{$user->name}}" hidden>
                <button type="submit" class="btn btn-danger"><i class="fa fa-user-times"></i> INATIVAR O USUÁRIO: {{ $user->name }}</button>
            </form>
        </div>
    </div>
@endsection
