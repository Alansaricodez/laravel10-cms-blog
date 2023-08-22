<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->first();
;
        $randomPosts = Post::all()->take(4);

        $categories = Category::all();

        return view('welcome', compact('latestPost', 'randomPosts', 'categories'));
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
