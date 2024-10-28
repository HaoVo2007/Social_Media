<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'cover_path' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 100) . '/800/600',
            'thumnail_path' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 100) . '/800/600',
            'auto_approval' => $this->faker->boolean,
            'about' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id, // Assumes user is created via factory
            'delete_at' => null,
            'delete_by' => null,
        ];
    }

    /**
     * Add an afterCreating callback to create a GroupUser record.
     *
     * @return static
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Group $group) {
            GroupUser::create([
                'user_id' => $group->user_id,
                'group_id' => $group->id,
                'status' => 'approve', 
                'role' => 'admin', 
                'created_by' => $group->user_id,
            ]);
        });
    }
}
