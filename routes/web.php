<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/login', [MainController::class, 'login_page'])->name('login_page');
Route::get('/register', [MainController::class, 'register_page'])->name('register_page');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login_submit');
Route::post('/register', [UserController::class, 'register'])->name('register_submit');

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home_page');
});

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Conexão com o banco de dados bem-sucedida!";
    } catch (\Exception $e) {
        return "Erro na conexão: " . $e->getMessage();
    }
});