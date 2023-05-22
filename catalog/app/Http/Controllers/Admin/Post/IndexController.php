<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::all();
        $addresses = Address::all();
        return view('admin.post.index', compact('posts', 'categories','addresses'));
    }
}
