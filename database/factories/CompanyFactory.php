<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'name' => fake()->text(20),
            'beschreibung' => fake()->text(100),
            'telefon' => fake()->e164PhoneNumber(),
            'benutzername' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password 
            'firma_logo_url' => fake()->imageUrl(rand(50, 500), rand(50, 500), 'companies', true, 'Faker'),
            'haus_nummer' => fake()->buildingNumber(),
            'strasse' => fake()->streetName(),
            'stadteil' => fake()->city(),
            'postleitzahl' => fake()->postcode(),
            'stadt' => fake()->state(),
            'land' => fake()->unique()->country(),
            'webseite' => fake()->unique()->url(),
            'facebook_url' => fake()->unique()->url(),
            'linkedin_url' => fake()->unique()->url(),
            'threads_url' => fake()->unique()->url(),
            'twitter_url' => fake()->unique()->url(),
            'xing_url' => fake()->unique()->url(),
            'andere_social' => fake()->word(),
            'andere_social_url' => fake()->unique()->url(),
            'hinzugefügt_von_tenmedia' => fake()->boolean(),
            'hinzugefügt_von' => fake()->name(),
        ];
    }
}
