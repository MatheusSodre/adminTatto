@extends('adminlte::page')

@section('title', 'Dashboard')

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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($produtos as $produto)
                    @dd($produtos);
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <!-- <td> R$ {{ number_format($produto->price, 2, ',', '.') }}</td> -->
                            <td>{{$produto->sku}}</td>
                            <td>{{$produto->barCode}}</td>
                            <td style="width=10px;">
                                <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> Ver</a>
                                <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">

                </ul>
        </div>
    </div>
</div>

@stop
