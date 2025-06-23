<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'John Doe',
                    'email' => 'john@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'Jane Smith',
                    'email' => 'jane.smith@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'Carlos Eduardo',
                    'email' => 'carlos.edu@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'Maria Fernanda',
                    'email' => 'maria.fernanda@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'Lucas Silva',
                    'email' => 'lucas.silva@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => NULL,
                ],
                [
                    'username' => 'Ana Paula',
                    'email' => 'ana.paula@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => now(),
                ],
                [
                    'username' => 'Pedro Henrique',
                    'email' => 'pedro.henrique@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => now(),
                ],
                [
                    'username' => 'Laura Mendes',
                    'email' => 'laura.mendes@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => now(),
                ],
                [
                    'username' => 'Bruno Oliveira',
                    'email' => 'bruno.oliveira@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => now(),
                ],
            ]

        );
    }
}
