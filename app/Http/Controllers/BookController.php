<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function new(BookStoreRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('book_image')){
            $file = $request->file('book_image');
            $path = $file->store('books', 'public');
            $data['book_image'] = $path;
        }

        $book = new Book();
        $book->user_id     = $data['user_id'];
        $book->title       = $data['title'];
        $book->pages_qtd   = $data['pages_qtd'];
        $book->book_image  = $data['book_image'] ?? null;
        $book->gender      = $data['gender'];
        $book->publisher   = $data['publisher'];
        $book->description = $data['description'];

        $book->save();

        return redirect()->route('home_page');
    }
}
