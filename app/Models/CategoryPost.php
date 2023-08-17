<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'category_post';

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
