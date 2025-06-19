<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
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


        $email = $request->input('email');
        $password = $request->input('password');

        // Verify if user exists

        $user = User::where('email', $email)
            ->where('deleted_at', NULL)
            ->first();

        if(!$user){
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Usuário ou senha incorretos');
        }

        die('usuario encontrado e os caçamba');
    }
}
