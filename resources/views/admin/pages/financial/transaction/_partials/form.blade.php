@include('admin.includes.alerts')
@csrf

<h5><i class="fas fa-info-circle"></i> Informações básicas</h5>
<p>As informações básicas para você encontrar essa receita no sistema</p>
<input type="text" name="type" value="{{ $type }}" hidden>
<div class="form-group">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="data" class="form-label">Data <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="date" class="form-control" name="transaction_date" id="data" placeholder="18/09/2024">
            </div>
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label">Categoria <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control select2">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="cliente" class="form-label">Cliente <span class="text-danger">*</span></label>
            <select name="client_id" class="form-control select2">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-7">
        <label class="form-label">Descrição</label>
        <textarea class="form-control" name="description" rows="3" placeholder="Descrição"></textarea>
    </div>
</div>
<h5><i class="fas fa-info-circle"></i> Informações pagamento</h5>
{{-- A VISTA --}}

<div class="form-group row col-12">
    <div class="col-md-3">
        <label class="form-label">Valor Total <span class="text-danger">*</span></label>
        <input type="text" name="amount" id="money" class="form-control money" placeholder="0,00">
    </div>
    <div class="col-md-4">
        <label class="form-label">Condição de Pagamento</label>
        <select class="form-control select2" id="payment_conditions" name="payment_conditions">
            <option value="cash" selected>à vista</option>
            <option value="downPaymentInstallments">entra + parcelado</option>
            <option value="paymentInstallments">parcelado</option>
        </select>
    </div>
    <div class="col-md-4" id="cash" style="display: block;">
        <label class="form-label">Forma de Pagamento</label>
        <select class="form-control select2" id="payment_method" name="payment_method_cash">
            @foreach ($paymentMethods as $paymentMethod)
                <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- FINAL A VISTA --}}
{{-- PARCELADO --}}
<div class="form-group" id="installments-group" style="display: none;">
    <div class="row col-12">
        <div class="col-md-3">
            <label for="numeroParcelas" class="form-label">Número de Parcelas *</label>
            <input type="text" name="installment" class="form-control" id="numeroParcelas" placeholder="1">
        </div>
        <div class="col-md-4">
            <label class="form-label">Forma de Pagamento</label>
            <select class="form-control select2" id="payment_method" name="payment_method_installment">
                @foreach ($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="data" class="form-label">Data <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="date" class="form-control" name="due_date" id="data" placeholder="18/09/2024">
            </div>
        </div>
    </div>
</div>
{{-- FIM PARCELADO --}}
{{-- ENTRADA + PARCELA --}}
<div class="form-group" id="down-payment-group" style="display: none;">
    <div class="row col-12">
        <div class="col-md-3">
            <label for="valorEntrada" class="form-label">Valor de entrada *</label>
            <div class="input-group">
                <input type="text" class="form-control" id="money_down_payment" class="form-control money"
                    name="down_payment" placeholder="0,00">
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">Forma de Pagamento</label>
            <select class="form-control select2" id="payment_method" name="payment_method_down_payment">
                @foreach ($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row col-12">
        <div class="col-md-3">
            <label for="numeroParcelas" class="form-label">Número de Parcelas *</label>
            <input type="text" name="installment_number" class="form-control" id="numeroParcelas"
            placeholder="1">
        </div>
        <div class="col-md-4">
            <label class="form-label">Forma de Pagamento</label>
            <select class="form-control select2" id="payment_method" name="payment_method_down_payment_installment">
                @foreach ($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="data" class="form-label">Data das parcelas<span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="date" class="form-control" name="due_date" id="data" placeholder="18/09/2024">
            </div>
        </div>
    </div>
</div>

<div class="form-group">

    <button type="submit" class="btn btn-primary">Continuar <i class="fas fa-arrow-right"></i></button>
</div>

<script>
    document.getElementById('payment_conditions').addEventListener('change', function() {
        const condition = this.value;
        console.log(condition);
        const cash = document.getElementById('cash');
        const installmentsGroup = document.getElementById('installments-group');
        const downPaymentGroup = document.getElementById('down-payment-group');



        if (condition === 'cash') {
            installmentsGroup.style.display = 'none';
            downPaymentGroup.style.display = 'none';
            cash.style.display = 'block';
        } else if (condition === 'downPaymentInstallments') {
            cash.style.display = 'none';
            installmentsGroup.style.display = 'none';
            downPaymentGroup.style.display = 'block';
        } else if (condition === 'paymentInstallments') {
            cash.style.display = 'none';
            installmentsGroup.style.display = 'block';
            downPaymentGroup.style.display = 'none';
        }


    });
</script>
