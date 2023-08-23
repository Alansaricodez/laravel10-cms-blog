<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach($posts as $post){
            $category = Category::all()->random(1)->first();

            if(!CategoryPost::where('post_id', '=', $post->id)->first()){
                CategoryPost::create([
                    'category_id' => $category->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
