<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentLikeFactory extends Factory
{
    protected $model = CommentLike::class;

    public function definition(): array
    {
        return [
            'comment_id' => Comment::inRandomOrder()->first()->id, 
            'user_id' => User::inRandomOrder()->first()->id,
            'type' => 'like',
        ];
    }
}
