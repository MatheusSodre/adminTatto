@include('admin.includes.alerts')

<style>
    /* Adicione seus estilos CSS aqui */


    .input-group-append {
        cursor: pointer;
    }

    .input-group-append .input-group-text {
        background-color: #fff;
        border: none;
        padding: 10px;
    }

    .input-group-append .input-group-text i {
        font-size: 18px;
        color: #666;
    }
</style>
@csrf
<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label>* Cliente:</label>
            @if (is_iterable($clientes))
                <select name="user_id" class="form-control select2">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="user_id" class="form-control select2">
                    <option value="{{ $clientes->id }}" selected>{{ $clientes->name }}</option>
                </select>
            @endif
        </div>
        <div class="col-6">
            <label>* Documento:</label>
            <select name="type_id" class="form-control select2">
                @foreach ($documentos as $documento)
                    <option value="{{ $documento->id }}">{{ $documento->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="row ">
            <div class="col-6">
                <label>Nome do arquivo:</label>
                <input type="text" name="name" class="form-control" placeholder="Arquivo exemplo"
                    value="{{ $user->name ?? old('name') }}">
            </div>
            <div class="col-6">
                <label>Serviço:</label>
                <select name="servicos" class="form-control select2">
                    <option value="S">Segurança</option>
                    <option value="F">Facilities</option>
                    <option value="P">Patrimonial</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-grup">
        <div class="row">
            {{-- <div class="col-5">
            </div> --}}
            <div class="col-2">
                <label for="date">Data:</label>
                <div class="input-group date">
                    <input type="text" class="form-control" id="calendario" name="data_arquivo"
                        placeholder="Selecione a data">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    {{-- <label for="file-upload" class="custom-file-label">Escolha um arquivo:</label> --}}
    <label>Arquivo:</label>
    <input id="file-upload" class="custom-file-input" name="files[]" type="file" multiple>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
</div>
