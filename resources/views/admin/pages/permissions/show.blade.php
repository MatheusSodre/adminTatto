@extends('adminlte::page')

@section('title', "Detalhes do perfil {$permissions->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $permissions->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permissions->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permissions->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', $permissions->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $permissions->name }}</button>
            </form>
        </div>
    </div>
@endsection
