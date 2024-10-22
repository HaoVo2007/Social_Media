<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostAttechment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostAttechmentFactory extends Factory
{
    protected $model = PostAttechment::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id, 
            'name' => $this->faker->word,
            'path' => 'https://picsum.photos/id/' . $this->faker->unique()->numberBetween(1, 100) . '/800/600', 
            'mime' => 'image/jpeg',
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
