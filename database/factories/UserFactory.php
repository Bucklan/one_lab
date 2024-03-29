<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    protected static ?string $password;


    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= bcrypt('user123'),
            'remember_token' => Str::random(10),
            'role_id' => Role::where('name', 'client')->first()->id
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
