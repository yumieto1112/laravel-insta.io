<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // #A post belongs to a user

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    // to get the categories under post
    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }

    // to get all the comments of a post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // to get the likes of a post
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // return TRUE if the AUTH user already likes the post
    public function isLiked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

}
