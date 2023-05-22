<?php


namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = Post::where('where_id', '1')->orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all();
        $addresses = Address::all();
        return view('catalog.index', compact('post', 'categories','addresses'));
    }
}
