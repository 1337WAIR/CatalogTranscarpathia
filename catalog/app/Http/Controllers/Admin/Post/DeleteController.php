<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostContent;

class DeleteController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        PostContent::where('post_id', $post['id'])->delete();
        $post->delete();
        return redirect()->route('post.index');
    }
}
