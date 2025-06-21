<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function new(BookStoreRequest $request)
    {
        $data = $request->validated();

        echo "<pre>";
        print_r($data);
        echo "</pre><br>";
    }
}
