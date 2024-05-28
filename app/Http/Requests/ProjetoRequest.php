<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:100', 'min:3'],
            'orcamento' => ['required', 'min:1', 'numeric'],
            'data_inicio' => ['required', 'date'],
            'data_final' => ['required', 'date'],
            'client_id' => ['required', 'exists:clients,id'],
        ];
    }
}
