@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Planos</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12"> <div class="card"> <div class="card-header"> <h3 class="card-title">Tabelas Planos</h3> </div>
        <div class="card-body"> 
        <table class="table table-bordered">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">ADD</button>
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
                <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i> Ver</a>
                <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-address-book"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>

    </div>

</div>
@stop