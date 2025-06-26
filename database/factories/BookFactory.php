<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // ou você pode criar relacionamento com factory de User
            'title' => $this->faker->sentence(3),  // título do livro com 3 palavras
            'authors' => $this->faker->firstName(),
            'nacional' => $this->faker->randomElement(['S', 'N']),
            'gender' => $this->faker->randomElement(['Fiction', 'Non-Fiction', 'Fantasy', 'Romance', 'Adventure']),
            'publisher' => $this->faker->company(),
            'description' => $this->faker->paragraph(2),
            'pages_qtd' => $this->faker->numberBetween(100, 800),
            // 'book_image' => 'books/' . $this->faker->slug() . '.jpg',
            'book_image' => 'books/default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
