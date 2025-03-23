<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lesson_name' => $this->faker->name(),
            'subject' => $this->faker->company(),
            'website' => $this->faker->url(),
            'video' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
