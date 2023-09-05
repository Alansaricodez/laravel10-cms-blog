<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        
        $posts = Post::query()
        ->where('title','LIKE',"%{$search}%")
        // ->orWhere('body','LIKE',"%$search%")
        ->get();

        //search in categories if posts == 0
        if($posts->count() == 0){
            $posts = Post::whereHas('categories', function ($query) use ($search) {
                if(App::isLocale('ar')){
                    $query->where('name_ar', $search);
                }else{
                    $query->where('name_en', $search);
                }
            })->get();
        }
        return view('post.search', compact('posts'));
    }
}
