<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Services\BookService;
use App\Services\LogService;
use Exception;


class BookController extends Controller
{
    public function new(BookStoreRequest $request)
    {
        try {
            BookService::create($request);

            return redirect()
                ->route('home_page')
                ->with('success', 'Livro cadastrado com sucesso');
        } catch (Exception $e) {

            LogService::error($e->getMessage());

            return redirect()
                ->back()
                ->with('exception_error', "Houve um erro ao cadastrar o livro, por favor entre em contato com o suporte")
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            BookService::delete($id);
            return redirect()->route('home_page');
        } catch (Exception $e) {
            LogService::error("{$e->getMessage()}");

            return redirect()
                ->route('home_page')
                ->with('exception_error', "Houve um erro ao deletar o livro, por favor entre em contato com o suporte");
        }
    }
}
