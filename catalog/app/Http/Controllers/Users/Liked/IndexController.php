<?php

namespace App\Http\Controllers\Users\Liked;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = auth()->user()->likedPosts;
        return view('user.liked.index', compact('post'));
    }
}
