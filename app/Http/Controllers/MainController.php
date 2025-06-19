<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }

    public function login_page(){
        return view('login');
    }

    public function register_page(){
        return view('register');
    }
}
