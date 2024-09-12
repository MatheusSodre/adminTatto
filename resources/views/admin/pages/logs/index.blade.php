@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('logs.index') }}" class="active">Logs</a></li>
    </ol>
@stop

@section('content')
<h2>Dados do Usuário</h2>
<ul>
</ul>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Acão</th>
                        <th>Alterado</th>
                        <th>Data Hora</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($logs as $log)
                        @php
                             $contextData = json_decode($log->context);
                        @endphp
                        <tr>
                            <td>
                                {{$contextData->user_name }}
                            </td>
                            <td>
                                {{ $log->message }}
                            </td>
                            <td>
                                {{ $contextData->destino }}
                            </td>
                            <td>
                                {{ date_format($log->created_at,"Y/m/d H:i:s") }}
                            </td>

                       </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-tools">
            {{$logs->links()}}
            {{-- @if (isset($filters))
                {!! $files->appends($filters)->links() !!}
            @else
                {{$files->links()}}
            @endif --}}
        </div>
    </div>
@stop
