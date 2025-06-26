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
            $books = Book::orderBy('created_at', 'desc')->paginate(5);

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

            if (!$book) {
                return redirect()->route('home_page')->with('exception_error', 'Erro ao buscar informações do livro');
            }

            return view('book/view', ['book' => $book]);
        } catch (Exception $e) {
            LogService::error($e->getMessage());
            return redirect()->back()->with('exception_error', 'Erro ao buscar informações sobre o livro');
        }
    }

    public function dashboard()
    {

        // Quantidade máxima das entidades
        $qtd_max_users = User::withTrashed()->count();
        $qtd_max_users_active = User::whereNull('deleted_at')->count();
        $qtd_max_users_inactive = User::onlyTrashed()->count();

        $qtd_max_books = Book::withTrashed()->count();
        $qtd_max_books_active = Book::whereNull('deleted_at')->count();
        $qtd_max_books_inactive = Book::onlyTrashed()->count();

        $porcent_active_users =  $qtd_max_users > 0 ? ($qtd_max_users_active / $qtd_max_users) * 100 : 0;
        $porcent_inactive_users = $qtd_max_users > 0 ? ($qtd_max_users_inactive / $qtd_max_users) * 100 : 0;

        $porcent_active_books =  $qtd_max_books > 0 ? ($qtd_max_books_active / $qtd_max_books) * 100 : 0;
        $porcent_inactive_books = $qtd_max_books > 0 ? ($qtd_max_books_inactive / $qtd_max_books) * 100 : 0;

        $genders = Book::distinct()->pluck('gender');

        $gender_list = $genders;

        // Pegando quantidade de livros por categoria

        $genders_array = [];

        foreach ($gender_list as $gender) {
            $genders_array[$gender] =
                [
                    'quantidade' => Book::where('gender', $gender)->count(),
                    'autores' => Book::where('gender', $gender)->pluck('authors')->unique()->values()->all(),
                    'titulos' => Book::where('gender', $gender)->pluck('title')->unique()->values()->all(),
                    'editoras' => Book::where('gender', $gender)->pluck('publisher')->unique()->values()->all()
                ];
        }

        echo "<pre>";
        print_r($genders_array);
        echo "</pre>";

        echo "<h1>Usuários</h1>";

        echo "Quantidade de usuários total: $qtd_max_users <br>";
        echo "Quantidade de usuários ativos: $qtd_max_users_active <br>";
        echo "Quantidade de usuários inativos: $qtd_max_users_inactive <br>";

        echo "<h2>Porcentagens</h2>";


        echo "Usuários ativos   : {$porcent_active_users}%     <br>";
        echo "Usuários inativos : {$porcent_inactive_users}% <br>";

        echo "<br><br>";

        echo "<h1>Livros</h1>";

        echo "Quantidade de livros total: $qtd_max_books <br>";
        echo "Quantidade de livros ativos: $qtd_max_books_active <br>";
        echo "Quantidade de livros inativos: $qtd_max_books_inactive <br>";

        echo "<h2>Porcentagens</h2>";


        echo "Livros ativos   : {$porcent_active_books}%     <br>";
        echo "Livros inativos : {$porcent_inactive_books}% <br>";
    }
}
