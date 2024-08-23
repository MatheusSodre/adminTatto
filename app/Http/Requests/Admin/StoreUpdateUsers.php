<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUsers extends FormRequest
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
        $id = $this->segment(3);
        $rules =  [
            'name' => "required|min:3|max:255|unique:users,name,{$id},id",
            'email' => "nullable|min:3|max:255|email|unique:users,email,{$id},id",
            'password' => 'required|string|min:6|max:16',
            'cnpj' => "required|string|min:6|max:16|unique:users,email,{$id},id"
        ];
        if ($this->method() == 'PUT') {
            $rules['password'] = 'nullable|string|min:6|max:16';
        }
        return $rules;
    }
}
