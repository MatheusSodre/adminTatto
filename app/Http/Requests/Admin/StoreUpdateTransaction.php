<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTransaction extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'payment_conditions' => 'required|in:cash,paymentInstallments,downPaymentInstallments',
            'type' => 'required|in:expense,receivable,purchase,sale',
            'transaction_date' => 'required|date',
            'amount' => ['required' , 'regex:/^\d{1,3}(\.\d{3})*,\d{2}$/'],
            'category_id' => 'required|exists:categories_payments,id',
            // 'client_id' => 'required|exists:clients,id',
        ];

        switch ($this->input('payment_conditions')) {
            case 'cash':
                break;

            case 'paymentInstallments':
                $rules['installment'] = 'required|numeric';
                break;

            case 'downPaymentInstallments':
                $rules['down_payment'] = ['required' , 'regex:/^\d{1,3}(\.\d{3})*,\d{2}$/'];
                $rules['due_date'] = 'required|date';
                $rules['installment_number'] = 'required|numeric';
                break;
        }

        return $rules;
    }

    public function messages()
    {
        return [
           'min' => 'Campo deve ter no mínimo :min caracteres',
           'max' => 'Campo deve ter no maximo :max caracteres',
           'required' => 'O campo :attribute é obrigatório',
           'numeric' => 'O campo :attribute é numerico'
        ];
    }

    public function attributes()
    {
        return [
            'payment_conditions' => 'Condição de Pagamento',
            'type' => 'Tipo',
            'date' => 'Data',
            'amount' => 'Valor Total',
            'installment_number' => 'Número de Parcelas',
            'down_payment' => 'Valor de entrada',
            'due_date' => 'Data das parcelas',
            'category_id' => 'Categoria',
            'client_id' => 'Cliente',

        ];
    }
}
