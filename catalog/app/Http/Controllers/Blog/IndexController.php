<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('blog.index', compact('post'));
    }
}
