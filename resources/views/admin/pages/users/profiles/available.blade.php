@extends('adminlte::page')

@section('title', 'Perfis disponíveis para o plano {$perfil->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuario</a></li>
{{--        <li class="breadcrumb-item"><a href="{{ route('plans.users', $plan->id) }}">Perfis</a></li>--}}
{{--        <li class="breadcrumb-item active"><a href="{{ route('plans.users.available', $plan->id) }}" class="active">Disponíveis</a></li>--}}
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
           {{-- <form action="{{ route('users.profiles.available', $user->id) }}" method="POST" class="form form-inline">
               @csrf
               <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
               <button type="submit" class="btn btn-dark">Filtrar</button>
           </form> --}}
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Perfil</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('users.profiles.attach',$user->id)}}" method="POST">
                        @csrf
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                </td>
                                <td>
                                    {{ $profile->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-warning">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
