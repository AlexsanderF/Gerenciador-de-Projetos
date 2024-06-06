<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 *
 */
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
     * Prepara os dados da request do funcionário para validação
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $dados = $this->all();
        if (isset($dados['cpf']) || isset($dados['cep'])) {
            $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
            $dados['cep'] = str_replace(['.', '-'], '', $dados['cep']);
        }

        $this->replace($dados);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:100', 'min:3'],
            'cpf' => ['required', 'size:11'],
            'data_contratacao' => ['required', 'date_format:d/m/Y'],
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
