<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\Services\BookService;
use App\Services\LogService;
use App\Services\Operations;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function new(BookStoreRequest $request)
    {
        try {
            $status = BookService::create($request);

            return redirect()
                ->route('home_page')
                ->with('success', 'Livro cadastrado com sucesso');
        } catch (Exception $e) {

            LogService::info("{$e->getMessage()}");

            return redirect()
                ->back()
                ->with('exception_error', "Houve um erro ao cadastrar o livro, por favor entre em contato com o suporte")
                ->withInput();
        }
    }

    public function destroy($id): RedirectResponse
    {
        $id = Operations::decrypyId($id);
        if ($id === null) {
            return redirect()->route('home_page');
        }

        $book = Book::find($id);
        $book->deleted_at = date('Y:m:d H:i:s');
        $book->save();

        return redirect()->route('home_page');
    }
}
