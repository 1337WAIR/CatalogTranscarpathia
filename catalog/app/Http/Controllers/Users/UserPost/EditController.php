<?php

namespace App\Http\Controllers\Users\UserPost;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostContent;

class EditController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        $post_content = PostContent::where('post_id', "$post->id")->orderBy('num')->get();
        $addresses = Address::all();
        $categories = Category::all();
        return view('user.post.edit', compact('post', 'addresses', 'categories','post_content'));
    }
}

