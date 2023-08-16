<?php

namespace App\Http\Controllers;

use App\Models\Post;


class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->first();
;
        $randomPosts = Post::all()->take(6);

        return view('welcome', compact('latestPost', 'randomPosts'));
    }
}
