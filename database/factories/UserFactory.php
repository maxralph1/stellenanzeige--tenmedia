<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            // 'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,

            'role_id' => Role::all()->random()->id,
            'vorname' => fake()->firstName(),
            'zweitename' => fake()->firstName(),
            'nachname' => fake()->lastName(),
            'benutzername' => fake()->unique()->userName(),
            'telefon' => fake()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            // 'profile_photo_url' => fake()->imageUrl(rand(50, 500), rand(50, 500), 'companies', true, 'Faker'),
            'haus_nummer' => fake()->buildingNumber(),
            'strasse' => fake()->streetName(),
            'stadteil' => fake()->city(),
            'postleitzahl' => fake()->postcode(),
            'stadt' => fake()->state(),
            'land' => fake()->unique()->country(),
            'webseite' => fake()->unique()->url(),
            'facebook_url' => fake()->unique()->url(),
            'github_url' => fake()->unique()->url(),
            'linkedin_url' => fake()->unique()->url(),
            'threads_url' => fake()->unique()->url(),
            'twitter_url' => fake()->unique()->url(),
            'xing_url' => fake()->unique()->url(),
            'andere_social' => fake()->word(),
            'andere_social_url' => fake()->unique()->url(),
            'anschreiben' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
            'anschreiben_url' => fake()->unique()->url(),
            'lebenslauf_url' => fake()->unique()->url(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
