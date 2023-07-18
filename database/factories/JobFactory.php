<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::all()->random()->id,
            'job_category_id' => JobCategory::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'slug' => fake()->unique()->slug(),
            'bezeichnung' => fake()->text(20),
            'beschreibung' => fake()->text(100),
            'standort' => fake()->address(),
            'bewerbungen_per_email_erhalten' => fake()->boolean(),
            'email_bucket_für_bewerbungen' => fake()->unique()->safeEmail(),
        ];
    }
}
