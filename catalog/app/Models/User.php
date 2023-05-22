<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    protected $guarded = false;
    public function likedPosts(){
        return $this->belongsToMany(Post::class,'post_user_likes','user_id', "post_id");
    }
}

