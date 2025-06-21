<?php

namespace Database\Seeders;

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
                'title'       => 'The Laravel Journey',
                'pages_qtd'   => 320,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Laravel+Book',
                'gender'      => 'Programming',
                'publisher'   => 'CodePress',
                'description' => 'An in-depth guide to mastering Laravel.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'PHP for Humans',
                'pages_qtd'   => 210,
                'book_image'  => 'https://via.placeholder.com/300x400?text=PHP+Book',
                'gender'      => 'Technology',
                'publisher'   => 'TechReads',
                'description' => 'A practical book to learn PHP from scratch.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'JavaScript Secrets',
                'pages_qtd'   => 180,
                'book_image'  => 'https://via.placeholder.com/300x400?text=JS+Book',
                'gender'      => 'Web Development',
                'publisher'   => 'JSWorld',
                'description' => 'Uncover the secrets of modern JavaScript.',
            ],
        ]);
    }
}
