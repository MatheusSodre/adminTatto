@extends('adminlte::page')

@section('title', 'Cadastrar novo Arquivo')

@section('content_header')
    <h1>Cadastrar novo Arquivo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('files.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('admin.pages.files._partials.form')
            </form>
        </div>
    </div>
@endsection
