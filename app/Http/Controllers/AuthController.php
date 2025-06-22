<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function logout():RedirectResponse {
        session()->forget('user');
        return redirect()
            ->route('login_page');
    }

    public function login(Request $request):RedirectResponse
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
                ->with('loginError', 'Usuário não encontrado');
        }

        if(!password_verify($password, $user->password)){
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Senha ou email incorretos');
        }

        $user->last_login =date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email
            ]
            ]);

        
        return redirect()  
            ->route('home_page');

    }
}
