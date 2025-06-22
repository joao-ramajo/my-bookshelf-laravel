<?php

namespace App\Services;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Exception;

class BookService
{
    public static function create(BookStoreRequest $request):bool
    {
        $data = $request->validated();

        if ($request->hasFile('book_image')) {
            $file = $request->file('book_image');
            $path = $file->store('books', 'public');
            $data['book_image'] = $path;
        }

        $book = new Book();
        $book->user_id     = $data['user_id'];
        $book->title       = $data['title'];
        $book->nacional    = $data['nacional'];
        $book->pages_qtd   = $data['pages_qtd'];
        $book->book_image  = $data['book_image'] ?? null;
        $book->gender      = $data['gender'];
        $book->publisher   = $data['publisher'];
        $book->description = $data['description'];

        return $book->save();

    }
}
