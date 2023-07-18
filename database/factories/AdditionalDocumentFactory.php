<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdditionalDocument>
 */
class AdditionalDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'slug' => fake()->unique()->slug(),
            'dokument_titel' => fake()->text(50),
            'dokument_url' => fake()->unique()->url(),
        ];
    }
}
