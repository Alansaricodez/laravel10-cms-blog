<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latestPost = Post::latest()->first();

        return view('welcome', compact('latestPost'));
    }
}
