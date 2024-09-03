@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Produtos</h1>
@stop
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="ms-2">
                    <div class="btn btn-dark btn-lg btn-flat" data-toggle="modal" data-target="#modal-xl">
                        <i class="fas fa-plus-square fa-lg mr-2"></i> Cadastrar Produto
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Fornecedor</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Medida</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($produtos as $produto)

                        <tr>
                            <td>{{$produto['nome']}}</td>
                            <td>{{$produto['categoria']['nome']}}</td>
                            <td>{{$produto['marca']['nome']}}</td>
                            <td>{{$produto['fornecedor']['nome']}}</td>
                            <td> R$ {{ number_format($produto['valores']['preco'], 2, ',', '.') }}</td>
                            <td>{{$produto['estoque']['quantidade']}}</td>
                            <td>{{$produto['medida']['nome']}}</td>
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
                            <label>Multiple (.select2-purple)</label>
                            <div class="select2-purple">
                                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="16" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 770.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
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
                            <button type="submit" class="btn btn-dark">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
