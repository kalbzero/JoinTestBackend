<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome_produto' => 'required|string|max:150',
            'valor_produto' => 'required|numeric',
            'id_categoria_produto' => [
                'required',
                Rule::exists('tb_categoria_produto', 'id_categoria_produto')
            ],
        ];
    }
}
