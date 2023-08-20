<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random(1)->first();

        $title = fake()->realtext(50);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'body' => fake()->realText(5000),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'user_id' => $user->id
        ];
    }
}
