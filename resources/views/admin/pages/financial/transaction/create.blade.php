@extends('adminlte::page')

@section('title', 'Cadastrar novo Usuário')

@section('content_header')
    <h1>Cadastrar nova receita</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('financial.transactions.store') }}" class="form" method="POST">
                @include('admin.pages.financial.transaction._partials.form')
            </form>
        </div>
    </div>

@endsection
