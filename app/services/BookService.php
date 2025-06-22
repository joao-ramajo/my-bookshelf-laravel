<?php

namespace App\Services;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Exception;

class BookService
{
    public static function create(BookStoreRequest $request): bool
    {
        $data = $request->validated();

        if ($request->hasFile('book_image')) {
            $file = $request->file('book_image');
            $path = $file->store('books', 'public');
            $data['book_image'] = $path;
        }

        $authors = array_map('trim', explode(';', $data['authors']));
        $data['authors'] = implode(', ', $authors) . '.';

        $book = new Book();
        $book->user_id     = $data['user_id'];
        $book->title       = $data['title'];
        $book->authors     = $data['authors'];
        $book->nacional    = $data['nacional'];
        $book->pages_qtd   = $data['pages_qtd'];
        $book->book_image  = $data['book_image'] ?? null;
        $book->gender      = $data['gender'];
        $book->publisher   = $data['publisher'];
        $book->description = $data['description'];

        return $book->save();
    }

    public static function delete($id)
    {
        $id = Operations::decrypyId($id);
        if ($id === null) {
            return redirect()->route('home_page');
        }

        throw new Exception('apagando conta');

        $book = Book::find($id);
        $book->deleted_at = date('Y:m:d H:i:s');
        $book->save();
    }
}
