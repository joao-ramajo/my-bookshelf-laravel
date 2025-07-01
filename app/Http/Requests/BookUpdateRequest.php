<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'user_id' => 'required',
            'title' => 'required|max:255',
            'authors' => 'required',
            'nacional' => 'required',
            'pages_qtd' => 'required',
            'gender' => 'required',
            'publisher' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Você não tem acesso a este recurso',
            'title.required' => 'O titúlo é obrigatório',
            'title.unique' => 'Já existe um livro com este titúlo',
            'title.max' => 'O titulo não pode passar de :max caracteres',
            'pages_qtd.required' => 'Este campo é obrigatório',
            'gender.required' => 'Este campo é obrigatório',
            'publisher.required' => 'Este campo é obrigatório',
            'description.required' => 'Este campo é obrigatório',
            'authors' => 'Este campo é obrigatório'
        ];
    }
}
