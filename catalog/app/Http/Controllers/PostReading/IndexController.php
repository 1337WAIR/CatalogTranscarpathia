<?php

namespace App\Http\Controllers\PostReading;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostReading\ReadingRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostContent;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(ReadingRequest $request)
    {
        $post_id = $request->post_id;
        $post = Post::where('id',$post_id)->first();
        $post_content= PostContent::where('post_id',$post_id)->orderBy('num')->get();
        $users = User::where('id', $post->user_id)->first();
        return view('reading.index', compact('post','post_content','users'));
    }
}
