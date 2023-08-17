<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(8);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
     

        $slug = Str::slug($request->title);

        if($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageUrl =$request->image->getClientOriginalName();
            $request->file('image')->storeAs('post_images', $imageUrl, 'public');


            $post = Post::create([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'user_id' => $request->user_id,
                'image' => 'storage/post_images/'.$imageUrl,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            CategoryPost::create([
                'category_id' => $request->category,
                'post_id' => $post->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
          
        } else {
            $post = Post::create([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'user_id' => $request->user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            CategoryPost::create([
                'category_id' => $request->category,
                'post_id' => $post->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }

        return redirect('/posts');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function byCategory(Category $category){
        $posts = Post::query()
        ->join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.category_id', '=', $category->id)
        ->whereDate('published_at', '<=', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->paginate(10);

        return view('post.index', compact(['posts', 'category']));
    }
}
