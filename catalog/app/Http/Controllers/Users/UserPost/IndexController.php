<?php

namespace App\Http\Controllers\Users\UserPost;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        try {
            $post = Post::where('user_id','=',auth()->user()->id);
            $post = $post->orderBy('created_at', 'desc')->paginate(6);
        }catch (\Exception $exception){
            abort(404);
        }
        return view('user.post.index', compact('post'));
    }
}

