<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function shortBody($words = 12){
        return \Illuminate\Support\Str::words(strip_tags($this->body), $words);
    }

    public function getImage(){
        if(!$this->image){
            return '/storage/default.png';
        }
        return $this->image;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLiked(): bool
    {
        $postLike = Like::where('post_id', '=',$this->id)->where('user_id', '=',Auth::id())->first();

        if($postLike){
            return true;
        }else{
            return false;
        }
     
    
    }
 
    public function removeLike()
    {
        $postLike = Like::wherePost_id($this->id)->whereUser_id(Auth::id());
        if($postLike){
           $postLike->delete();
        }
    }
}
