<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'user_id'     => 'required|integer|exists:users,id',
            'title'       => 'required|string|unique:books,title|max:255',
            'pages_qtd'   => 'required|integer|min:1',
            'gender'      => 'required|string|max:100',
            'publisher'   => 'required|string|max:150',
            'description' => 'required|string|min:10',
        ];
    }


    public function messages(): array
    {
        return [
            'user_id.required'     => 'O usuário é obrigatório.',
            'user_id.integer'      => 'O usuário deve ser um número inteiro.',
            'user_id.exists'       => 'O usuário informado não existe.',

            'title.required'       => 'O título é obrigatório.',
            'title.string'         => 'O título deve ser um texto.',
            'title.unique'         => 'Já existe um livro com este título.',
            'title.max'            => 'O título não pode ultrapassar 255 caracteres.',

            'pages_qtd.required'   => 'O número de páginas é obrigatório.',
            'pages_qtd.integer'    => 'O número de páginas deve ser um número inteiro.',
            'pages_qtd.min'        => 'O livro deve ter ao menos uma página.',

            'gender.required'      => 'O gênero é obrigatório.',
            'gender.string'        => 'O gênero deve ser um texto.',
            'gender.max'           => 'O gênero não pode passar de 100 caracteres.',

            'publisher.required'   => 'A editora é obrigatória.',
            'publisher.string'     => 'A editora deve ser um texto.',
            'publisher.max'        => 'O nome da editora é muito longo.',

            'description.required' => 'A descrição é obrigatória.',
            'description.string'   => 'A descrição deve ser um texto.',
            'description.min'      => 'A descrição deve ter pelo menos 10 caracteres.',
        ];
    }
}
