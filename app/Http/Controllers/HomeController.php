<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->first();

        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(5)->get();

        $categories = Category::all();

        return view('welcome', compact('latestPost', 'popularPosts', 'categories'));
    }

    public function search(Request $request){
        $search = $request->textInput;
        $posts = Post::where('title','LIKE','%'.$search.'%')
        ->orWhere('body','LIKE','%'.$search.'%')
        ->get();

        //search in categories if posts == 0
        if(!$posts){
            $posts = Category::where('name','LIKE','%'.$search.'%')->first()->posts;
        }
        return view('post.search', compact('posts'));
    }
}
