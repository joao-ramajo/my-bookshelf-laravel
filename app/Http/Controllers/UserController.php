<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\LogService;
use App\Services\Operations;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function register(Request $request)
    {

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

    public function destroy($id)
    {
        $id = Operations::decrypyId($id);
        if ($id === null) {
            return redirect()->route('home_page');
        }

        $user = User::find($id);

        // Using soft delete for users
        $user->deleted_at = date('Y:m:d H:i:s');
        $user->save();

        return redirect()->route('logout');
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Operations::decrypyId($data['user_id']);

            $user = User::find($data['user_id']);

            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->save();

            session([
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email
                ]
            ]);

            return redirect()
                ->route('home_page')
                ->with('success', 'Informações atualizadas com sucesso');
        } catch (Exception $e) {
            LogService::error($e->getMessage());
            return redirect()
                ->route('home_page')
                ->with('exception_error', 'Erro ao atualizar dados, por favor entre em contato com o suporte');
        }
    }
}
