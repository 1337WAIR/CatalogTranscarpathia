<?php

namespace App\Http\Controllers\Users\Liked;
use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $posts)
    {
        if (auth()->check()) {
            auth()->user()->likedPosts()->toggle($posts->id);
        }
        return redirect()->route('blog.index');
    }
}
