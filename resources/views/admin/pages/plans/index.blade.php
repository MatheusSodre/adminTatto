@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>Planos</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabelas Planos</h3>
            </div>

            <div class="card-body">
                <div class="ms-2">
                    <div class="btn btn-dark btn-lg btn-flat" data-toggle="modal" data-target="#modal-xl">
                        <i class="fas fa-plus-square fa-lg mr-2"></i>Add New
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td> R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td>{{$plan->description}}</td>
                            <td style="width=10px;">
                                <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> <i class="fa fa-search" ></i></a>
                                <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i> <i class="fas fa-pencil-alt" aria-hidden="true"></i></i></a>
                                <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                 {!! $plans->links('vendor.pagination.bootstrap-4') !!}
                </ul>
        </div>
    </div>
</div>
    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo Plano</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('plans.store') }}" class="form" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome:" required>
                        </div>
                        <div class="form-group">
                            <label>Preço:</label>
                            <input type="text" name="price" class="form-control" placeholder="Preço:" required>
                        </div>
                        <div class="form-group">
                            <label>Descrição:</label>
                            <input type="text" name="description" class="form-control" placeholder="Descrição:" >
                        </div>
                        <div class="form-group modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
