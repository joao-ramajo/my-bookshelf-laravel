<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

Route::get('/login', [MainController::class, 'login_page'])->name('login_page');                // <- Render login page
Route::get('/register', [MainController::class, 'register_page'])->name('register_page');       // <- Render user register view
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');                       // <- Logout user account

Route::post('/login', [AuthController::class, 'login'])->name('login_submit');                  // <- Submit a login request 
Route::post('/register', [UserController::class, 'register'])->name('register_submit');         // <- Submit a register request

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home_page');                       // <- Render home page view
});

Route::prefix('book')->group(function () {
    Route::middleware([CheckIsLogged::class])->group(function () {
        Route::get('/', [MainController::class, 'new_book_page'])->name('books.page');          // <- render a Form to make a new book request
        Route::get('/{id}', [MainController::class, 'book'])->name('books.view');               // <- Get info about one book
        Route::post('/new', [BookController::class, 'new'])->name('books.new');                 // <- Make a post request to create a new Book
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');      // <- Destroy a book by id  
    });
});

Route::prefix('user')->group(function () {
    Route::middleware([CheckIsLogged::class])->group(function () {
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');     // <- Destroy a user by id
        Route::put('/', [UserController::class, 'update'])->name('users.update');
    });
});


Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Conexão com o banco de dados bem-sucedida!";
    } catch (\Exception $e) {
        return "Erro na conexão: " . $e->getMessage();
    }
});
