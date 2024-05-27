<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'bookname' => $this->faker->word(),
            'author' => $this->faker->word(),
            'year' => $this->faker->word(),
            'copies_in_circulation' => $this->faker->word(),
        ];
    }
}
