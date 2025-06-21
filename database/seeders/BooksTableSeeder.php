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
                'nacional'    => 'S',
                'description' => 'An in-depth guide to mastering Laravel.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'PHP for Humans',
                'pages_qtd'   => 210,
                'book_image'  => 'https://via.placeholder.com/300x400?text=PHP+Book',
                'gender'      => 'Technology',
                'publisher'   => 'TechReads',
                'nacional'    => 'S',
                'description' => 'A practical book to learn PHP from scratch.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'JavaScript Secrets',
                'pages_qtd'   => 180,
                'book_image'  => 'https://via.placeholder.com/300x400?text=JS+Book',
                'gender'      => 'Web Development',
                'publisher'   => 'JSWorld',
                'nacional'    => 'S',
                'description' => 'Uncover the secrets of modern JavaScript.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Mastering MySQL',
                'pages_qtd'   => 250,
                'book_image'  => 'https://via.placeholder.com/300x400?text=MySQL+Book',
                'gender'      => 'Databases',
                'publisher'   => 'DBPress',
                'nacional'    => 'S',
                'description' => 'Learn how to manage data with MySQL.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'CSS Zen',
                'pages_qtd'   => 190,
                'book_image'  => 'https://via.placeholder.com/300x400?text=CSS+Book',
                'gender'      => 'Design',
                'publisher'   => 'StyleWorks',
                'nacional'    => 'S',
                'description' => 'Craft beautiful websites with CSS.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'HTML5 Unleashed',
                'pages_qtd'   => 170,
                'book_image'  => 'https://via.placeholder.com/300x400?text=HTML5+Book',
                'gender'      => 'Web Development',
                'publisher'   => 'MarkupBooks',
                'nacional'    => 'S',
                'description' => 'Everything you need to know about HTML5.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Node.js in Practice',
                'pages_qtd'   => 230,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Node.js+Book',
                'gender'      => 'Backend',
                'publisher'   => 'NodeBooks',
                'nacional'    => 'S',
                'description' => 'Build scalable backends with Node.js.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'React Essentials',
                'pages_qtd'   => 240,
                'book_image'  => 'https://via.placeholder.com/300x400?text=React+Book',
                'gender'      => 'Frontend',
                'publisher'   => 'ReactWorld',
                'nacional'    => 'S',
                'description' => 'A beginner-friendly guide to React.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Vue.js Quickstart',
                'pages_qtd'   => 200,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Vue.js+Book',
                'gender'      => 'Frontend',
                'publisher'   => 'VuePress',
                'nacional'    => 'S',
                'description' => 'Get up and running with Vue.js fast.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'API Design with Laravel',
                'pages_qtd'   => 260,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Laravel+API+Book',
                'gender'      => 'Programming',
                'publisher'   => 'LaravelPro',
                'nacional'    => 'S',
                'description' => 'Design powerful APIs with Laravel.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Git para Todos',
                'pages_qtd'   => 150,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Git+Book',
                'gender'      => 'Versionamento',
                'publisher'   => 'DevOpsBooks',
                'nacional'    => 'S',
                'description' => 'Aprenda a usar Git como um profissional.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Docker para Devs',
                'pages_qtd'   => 180,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Docker+Book',
                'gender'      => 'DevOps',
                'publisher'   => 'CloudPress',
                'nacional'    => 'S',
                'description' => 'Use containers para facilitar seu desenvolvimento.',
            ],
            [
                'user_id'     => 1,
                'title'       => 'Clean Code na Prática',
                'pages_qtd'   => 300,
                'book_image'  => 'https://via.placeholder.com/300x400?text=Clean+Code+Book',
                'gender'      => 'Boas práticas',
                'publisher'   => 'CodeCraft',
                'nacional'    => 'S',
                'description' => 'Escreva código limpo e sustentável.',
            ],
        ]);
    }
}
