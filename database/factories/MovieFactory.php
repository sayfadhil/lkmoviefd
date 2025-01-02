<?php

namespace Database\Factories;

use App\Models\Genre; // Tambahkan ini
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Judul film
            'synopsis' => $this->faker->paragraph, // Sinopsis film
            'poster' => $this->faker->imageUrl(640, 480, 'movies', true), // URL poster
            'year' => $this->faker->year, // Tahun rilis
            'available' => $this->faker->boolean, // Ketersediaan
            'genre_id' => Genre::factory(), // Relasi ke Genre
        ];
    }
}
