<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => Job::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'slug' => fake()->unique()->slug(),
            'anschreiben' => fake()->text(100),
            'anschreiben_url' => fake()->unique()->url(),
            'lebenslauf_url' => fake()->unique()->url(),
        ];
    }
}
