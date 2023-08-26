<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random(1)->first();
        $post = Post::all()->random(1)->first();
        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => fake()->text(150),
        ];
    }
}
