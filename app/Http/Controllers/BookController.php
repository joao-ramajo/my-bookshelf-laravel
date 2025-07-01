<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Services\BookService;
use App\Services\LogService;
use App\Services\Operations;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BookController extends Controller
{
    public function new(BookStoreRequest $request):RedirectResponse
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

    public function destroy($id): RedirectResponse
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

    public function update(BookUpdateRequest $request, $id): RedirectResponse
    {

        $request->validated();
        $book_id =  Operations::decrypyId($id);

        BookService::update($request, $book_id);

        return redirect()
            ->route('books.view', ['id' => Crypt::encrypt($book_id)])
            ->with('success_message', 'Livro atualizado com sucesso');
    }
}
