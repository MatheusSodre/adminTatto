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

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O CLIENTE: {{ $user->name }}</button>
            </form>

        </div>
    </div>
@endsection
