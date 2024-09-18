@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('financial.index') }}" class="active">Financeiro</a></li>
    </ol>
@stop

@section('content')
    <h2>Lançamentos</h2>
    <ul>
    </ul>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <div class=""></div> --}}
                    <div class="text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <p class="lead mb-5"><br>
                                Mantenha suas finanças sob controle com lançamentos <br>
                                precisos de receitas e despesas. Planeje com <br>
                                tranquilidade e aproveite seu tempo livre.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-block btn-outline-warning btn-lg"><i class="fa fa-plus"></i>
                            Cadastrar despesa</button>
                        <button type="button" class="btn btn-block btn-outline-warning btn-lg"><i class="fa fa-plus"></i>
                            Cadastrar receita</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-block btn-outline-warning btn-lg"><i class="fa fa-plus"></i>
                            Cadastrar compra</button>
                        <button type="button" class="btn btn-block btn-outline-warning btn-lg"><i class="fa fa-plus"></i>
                            Cadastrar venda</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
