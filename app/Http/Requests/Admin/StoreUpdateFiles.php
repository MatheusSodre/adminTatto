<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFiles extends FormRequest
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
        return [
            'user_id' => "required",
            'data_arquivo' => 'required',
            'type_id' => 'required',
            'files.*'  => 'required|file|mimes:jpg,png,pdf|max:2048',
        ];
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
            'data_arquivo' => 'Data',
            'files'       => 'Arquivo'
        ];
    }
}
