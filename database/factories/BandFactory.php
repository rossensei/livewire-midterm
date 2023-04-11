<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Band>
 */
class BandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $location = [ 'Cebu City', 'Manila', 'Bohol', 'Pampanga', 'Quezon', 'Taguig'];
        $genre = [ 'Rock', 'Pop', 'Reggae', 'Acoustic', 'Classical'];
        $selected = fake()->randomElements($genre, 3);
        $genreString = implode(', ', $selected);

        return [
            'bandname' => fake()->word,
            'description' => fake()->text(),
            'genre' => $genreString,
            'location' => fake()->randomElement($location),
            'rate' => fake()->randomFloat(2, 500, 9999),
            'bandphoto' => fake()->imageUrl($width = 640, $height = 300)
        ];
    }
}
