<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id,
            'group_id' => null, 
            'deleted_by' => null,
            'delete_at' => null,
        ];
    }
}
