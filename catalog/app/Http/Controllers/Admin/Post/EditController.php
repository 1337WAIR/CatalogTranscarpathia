<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        $post_content = PostContent::where('post_id', "$post->id")->orderBy('num')->get();
        $addresses = Address::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'addresses', 'categories','post_content'));
    }
}

