<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\PostAttechment;
use App\Models\PostReaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(20)->create();

        $posts = Post::factory(100)->create();

        Comment::factory(500)->create();

        CommentLike::factory(500)->create();

        PostAttechment::factory(100)->create();

        PostReaction::factory(300)->create();
    }
}
