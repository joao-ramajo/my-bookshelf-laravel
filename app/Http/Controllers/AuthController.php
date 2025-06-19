<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(
            // Regras para os campos de email e senha
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:12'
            ],

            // Mensagens para os erros 

            [
                'email.required' => 'O email é obrigatório',
                'email.email' => 'Email inválido',
                'password.required' => 'A senha é obrigatória',
                'password.min' => "A senha deve conter ao menos :min caracteres",
                'password.max' => "A senha deve conter ao máximo :max caracteres"
            ]
        );

        echo "Show";
    }
}
