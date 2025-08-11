<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\ObjectsValues\Password;
use App\Services\LogService;
use App\Services\Operations;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class UserController extends Controller
{

    public function register(UserStoreRequest $request): RedirectResponse
    {
        try{
            $user = new User();
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = new Password($request->input('password'));
            $user->save();

            return redirect()->route('home_page');
        }catch(InvalidArgumentException $e){
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
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

    public function update(UserUpdateRequest $request): RedirectResponse
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
