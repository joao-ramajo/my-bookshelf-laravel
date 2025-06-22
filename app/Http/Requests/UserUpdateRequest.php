<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        return   [
                'user_id' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required|min:6|max:12|confirmed',
                'password_confirmation' => 'required|min:6|max:12'
        ];
    }

    public function messages(): array {
        return [
                'email.required' => 'Email é obrigatório',
                'email.email' => 'Formato incorreto, por favor insira um email válido',
                'username.required' => 'Nome de usuário é obrigatório',
                'password.required' => 'A senha é obrigatória',
                'password.min' => "A senha deve conter ao menos :min caracteres",
                'password.max' => "A senha deve conter ao máximo :max caracteres",
                'password.confirmed' => "As senhas devem ser iguais",
                'password_confirmation.required' => 'Confirma senha é obrigatória',
                'password_confirmation.min' => "A senha deve conter ao menos :min caracteres",
                'password_confirmation.max' => "A senha deve conter ao máximo :max caracteres"
        ];
    }
}
