<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:100', 'min:3'],
            'cpf' => ['required', 'size:11'],
            'data_contratacao' => ['required'],
            'logradouro' => ['required', 'string', 'max:100', 'min:3'],
            'numero' => ['required', 'string', 'max:20'],
            'bairro' => ['required', 'string', 'max:50'],
            'cidade' => ['required', 'string', 'max:50'],
            'estado' => ['required', 'string', 'size:2'],
            'cep' => ['required', 'size:8', 'string'],
            'complemento' => ['nullable', 'max:50'],
        ];
    }
}
