<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupUser>
 */
class GroupUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Assumes user is created via factory
            'group_id' => Group::inRandomOrder()->first()->id, // Assumes group is created via factory
            'token' => Str::random(32),
            'token_expire_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'token_user' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'status' => $this->faker->randomElement(['pending', 'approve']),
            'role' => $this->faker->randomElement(['user', 'admin']),
            'created_by' => User::inRandomOrder()->first()->id, // Assumes user is created via factory
        ];
    }
}
