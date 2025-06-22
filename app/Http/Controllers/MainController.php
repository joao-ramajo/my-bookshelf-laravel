<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Services\LogService;
use App\Services\Operations;
use Exception;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        try {
            $books = Book::orderBy('created_at', 'desc')->paginate(3);

            return view('home', ['books' => $books]);
        } catch (Exception $e) {
            LogService::error($e->getMessage());
            return view('home', ['books' => false]);
        }
    }

    public function login_page()
    {
        return view('login');
    }

    public function register_page()
    {
        return view('register');
    }

    public function new_book_page()
    {
        return view('book.register');
    }

    public function book($id)
    {
        try {
            $id = Operations::decrypyId($id);

            if ($id === NULL) {
                return redirect()->route('home_page')->with('exception_error', 'ID inválido');
            }

            $book = Book::find($id);
            
            if(!$book){
                return redirect()->route('home_page')->with('exception_error', 'Erro ao buscar informações do livro');
            }

            return view('book/view', ['book' => $book]);
        } catch (Exception $e) {
            LogService::error($e->getMessage());
            return redirect()->back()->with('exception_error', 'Erro ao buscar informações sobre o livro');
        }
    }
}
