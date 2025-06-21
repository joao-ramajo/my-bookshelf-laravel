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
            'user_id' => 'required',
            'title' => 'required|unique:books|max:255',
            'book_image' => 'required', // |image|mimes:jpeg,png,jpg|max:2048
            'authors' => 'required',
            'pages_qtd' => 'required',
            'gender' => 'required',
            'publisher' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O titúlo é obrigatório',
            'title.unique' => 'Já existe um livro com este titúlo',
            'pages_qtd.required' => 'Este campo é obrigatório',
            'gender.required' => 'Este campo é obrigatório',
            'publisher.required' => 'Este campo é obrigatório',
            'description.required' => 'Este campo é obrigatório',
            // 'book_image.required' => 'Você precisa enviar uma imagem.',
            // 'book_image.image'    => 'O arquivo deve ser uma imagem.',
            // 'book_image.mimes'    => 'Formatos permitidos: jpeg, jpg e png.',
            // 'book_image.max'      => 'A imagem não pode passar de 2MB.',
        ];
    }
}
