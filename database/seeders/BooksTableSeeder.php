<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('books')->insert([

            [
                'user_id'     => 1,
                'title'       => 'The Hobbit',
                'pages_qtd'   => 310,
                'book_image'  => 'books/The_Hobbit.jpg',
                'gender'      => 'Fantasy',
                'publisher'   => 'Allen & Unwin',
                'nacional'    => 'N',
                'description' => 'A fantasy novel by J.R.R. Tolkien and a prelude to The Lord of the Rings.',
                'authors'     => 'J.R.R. Tolkien',
            ],
            [
                'user_id'     => 1,
                'title'       => '1984',
                'pages_qtd'   => 328,
                'book_image'  => 'books/1984.jpg',
                'gender'      => 'Dystopian',
                'publisher'   => 'Secker & Warburg',
                'nacional'    => 'N',
                'description' => 'A dystopian novel by George Orwell about totalitarianism and surveillance.',
                'authors'     => 'George Orwell',
            ],
            [
                'user_id'     => 1,
                'title'       => 'To Kill a Mockingbird',
                'pages_qtd'   => 281,
                'book_image'  => 'books/To_Kill_a_Mockingbird.jpg',
                'gender'      => 'Drama',
                'publisher'   => 'J.B. Lippincott & Co.',
                'nacional'    => 'N',
                'description' => 'A novel by Harper Lee about racial injustice in the Deep South.',
                'authors'     => 'Harper Lee',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Pride and Prejudice',
                'pages_qtd'   => 279,
                'book_image'  => 'books/Pride_and_Prejudice.jpg',
                'gender'      => 'Romance',
                'publisher'   => 'T. Egerton',
                'nacional'    => 'N',
                'description' => 'A classic romance novel by Jane Austen with social critique.',
                'authors'     => 'Jane Austen',
            ],
            [
                'user_id'     => 1,
                'title'       => 'The Great Gatsby',
                'pages_qtd'   => 180,
                'book_image'  => 'books/The_Great_Gatsby.jpg',
                'gender'      => 'Fiction',
                'publisher'   => 'Charles Scribner\'s Sons',
                'nacional'    => 'N',
                'description' => 'A novel by F. Scott Fitzgerald about the American dream.',
                'authors'     => 'F. Scott Fitzgerald',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Moby-Dick',
                'pages_qtd'   => 635,
                'book_image'  => 'books/Moby_Dick.jpg',
                'gender'      => 'Adventure',
                'publisher'   => 'Harper & Brothers',
                'nacional'    => 'N',
                'description' => 'A novel by Herman Melville about the obsessive quest for a white whale.',
                'authors'     => 'Herman Melville',
            ],
            [
                'user_id'     => 1,
                'title'       => 'War and Peace',
                'pages_qtd'   => 1225,
                'book_image'  => 'books/War_and_Peace.jpg',
                'gender'      => 'Historical',
                'publisher'   => 'The Russian Messenger',
                'nacional'    => 'N',
                'description' => 'A historical novel by Leo Tolstoy set during the Napoleonic Wars.',
                'authors'     => 'Leo Tolstoy',
            ]
        ]);
        $qtd = env('BOOKS_COUNT', 5);
        Book::factory()->count($qtd)->create();
    }
}
