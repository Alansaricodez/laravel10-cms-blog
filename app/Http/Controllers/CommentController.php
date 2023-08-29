<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!auth()->check()) return redirect()->route('login');

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);

        return back()->with('message', 'Comment Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if(Auth::check() && Auth::id() == $comment->id){
            $comment->delete();
            return back()->with('message', 'Comment Deleted Successfully!');
        }else{
            return redirect()->to('/');
        }

    }
}
