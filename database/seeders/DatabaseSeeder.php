<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Follower;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\PostAttechment;
use App\Models\PostReaction;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $specificUsers = [
            ['name' => 'Hào', 'email' => 'hao@gmail.com'],
            ['name' => 'Bình', 'email' => 'binh@gmail.com'],
            ['name' => 'Tuấn', 'email' => 'tuan@gmail.com'],
            ['name' => 'Hiếu', 'email' => 'hieu@gmail.com'],
            ['name' => 'Nga', 'email' => 'nga@gmail.com'],
        ];
    
        foreach ($specificUsers as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('20072002'), 
            ]);
        }
        
        $users = User::factory(50)->create();

        Group::factory(50)->create();

        $posts = Post::factory(100)->create();

        Comment::factory(500)->create();

        CommentLike::factory(500)->create();

        PostAttechment::factory(100)->create();

        PostReaction::factory(300)->create();

        GroupUser::factory(200)->create();

        Follower::factory(100)->create();
    }
}
