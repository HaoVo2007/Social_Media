<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostReaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostReactionFactory extends Factory
{
    protected $model = PostReaction::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id, 
            'user_id' => User::inRandomOrder()->first()->id,
            'type' => 'like',
        ];
    }
}
