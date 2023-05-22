<?php

namespace App\Http\Controllers\Users\UserPost;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;

class CreateController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::all();
        $addresses = Address::all();
        return view('user.post.create_post', compact('posts', 'categories','addresses'));
    }
}
