@extends('adminlte::page')

@section('title', "Detalhes do perfil {$file->name}")



@section('content')
    <div class="invoice p-3 mb-3">

        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-file"></i> {{ $file->name }}
                    <small class="float-right">{{ $file->data_arquivo }}</small>
                </h4>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <b>Arquivo #{{$file->id}}</b><br>
                <br>
                <b>Serviço:</b> {{getStatusServicos($file->servicos)}}<br>
                <b>Documento:</b>email@email.com <br><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <object data="{{ asset('storage/' . $file->path) }}" type="application/pdf" width="100%" height="800">
                    <p>Seu navegador não suporta a exibição de arquivos PDF.</p>
                </object>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-12">
                <a href="{{ route('files.download', $file->id) }}" class="btn btn-primary float-right"><i
                        class="fas fa-download"></i>Download</a>
            </div>
        </div>
    </div>
@endsection
