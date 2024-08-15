@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('company.index') }}" class="active">Empresa</a></li>
    </ol>
    {{-- <h1>Permissão <a href="{{ route('permissions.create') }}" class="btn btn-dark">ADD</a></h1> --}}
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form> --}}
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
                    @foreach ($companies as $company)
                        <tr>
                            <td>
                                {{ $company->name }}
                            </td>
                            <td style="width=10px;">
                                {{-- <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('companies.profile', $company->id) }}" class="btn btn-warning"><i class="fa fa-users" aria-hidden="true"></i></a> --}}
{{--                                <a href="{{ route('companies.plans', permission->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $companies->appends($filters)->links() !!}
            @else
                {!! $companies->links() !!}
            @endif
        </div>
    </div>
@stop
