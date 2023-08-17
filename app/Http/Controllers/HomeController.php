<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->first();
;
        $randomPosts = Post::all()->take(4);

        $categories = Category::all();

        return view('welcome', compact('latestPost', 'randomPosts', 'categories'));
    }
}
