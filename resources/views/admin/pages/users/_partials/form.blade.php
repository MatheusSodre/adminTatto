@include('admin.includes.alerts')


@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Maria" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>* Email:</label>
    <input type="email" name="email" class="form-control" placeholder="email@email.com.br" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>* Cnpj:</label>
    <input type="text" name="cnpj" class="form-control cnpj" placeholder="33.476.015/0001-80" value="{{ $user->cnpj ?? old('Cnpj') }}">
</div>
<div class="form-group">
    <label>* Senha:</label>
    <input type="password" name="password" class="form-control" placeholder="Senha" >
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

