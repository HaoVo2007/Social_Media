<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id, 
            'user_id' => User::inRandomOrder()->first()->id,
            'comment' => $this->faker->sentence,
        ];
    }
}
