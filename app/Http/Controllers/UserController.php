<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use stdClass;

class UserController extends Controller
{
    public function register(Request $request)
    {
        echo "Criando novo usuario";

        $request->validate(
            [
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required|min:6|max:12|confirmed',
                'password_confirmation' => 'required|min:6|max:12'
            ],

            [
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
            ]
        );

        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('home_page');
    }
}
