<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert(
            [
                [
                    'user_id' => 1,
                    'book_id' => 1,
                    'comment' => 'Lorem ipslum dolor amet',
                    'note' => 5
                ]
            ]
        );
    }
}
