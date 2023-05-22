<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $requesr)
    {
       $search = $requesr->search;
       $post = Post::where('title' , 'LIKE', "%{$search}%")
           ->orWhere('main_content', 'LIKE', "%{$search}%")
           ->orderBy('created_at', 'desc')->paginate(12);
       return view('blog.index', compact('post'));
    }
}
