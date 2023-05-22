<?php

namespace App\Http\Controllers\Users\UserPost;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostContent;

class DeleteController extends Controller
{
    //
    public function __invoke(Post $post)
    {
        PostContent::where('post_id', $post['id'])->delete();
        $post->delete();
        return redirect()->route('user.post.index');
    }
}
