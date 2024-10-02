@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('logs.index') }}" class="active">Receita</a></li>
    </ol>
@stop

@section('content')
    <h2>Despesas</h2>
    <ul>
    </ul>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Uploads</span>
                    <span class="info-box-number">13,648</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">93,139</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Vencimento</th>
                        <th>Categoria</th>
                        <th>Valor em aberto</th>
                        <th>Valor pago</th>
                        <th>Valor total</th>
                        <th>Forma de pamento</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transaction as $t)
                        <tr>
                            <td>{{ $t->status }}</td>
                            <td>{{ $t->client->name }}</td>
                            <td>{{ $t->category->name }}</td>
                            <td>{{ $t->paymentCondition->name }}</td>
                            <td>
                                @foreach ($t->transactionPayments as $tp)
                                     {{ $tp->amount }}
                                    {{-- @dd($tp->paymentMethod->name) --}}

                                    <br>
                                @endforeach
                            </td>
                                <td>{{ $tp->paymentMethod->name }}</td>
                            {{-- <td>{{ $t->recurringTransaction->frequency }}</td>e --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{-- {{$logs->links()}} --}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
        </div>
    </div>
@stop
