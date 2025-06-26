<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
            'book_id' => $this->faker->numberBetween(1, Book::all()->count()),
            'comment' => $this->faker->text(),
            'note' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
