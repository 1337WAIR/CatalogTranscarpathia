<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\CatalogSearchRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\Post;

class CatalogSearchController extends Controller
{
    public function __invoke(CatalogSearchRequest $request)
    {
        $search = $request->search;
        $address = $request->address;
        $category = $request->category;
        $post = Post::where('where_id', '=', 1);
        if ($search !== null) {
            $post = $post->where('title', 'LIKE', "%{$search}%")->orWhere('main_content', 'LIKE', "%{$search}%");
        }
        if ($address !== null) {
            $post = $post->where('address_id', $address);
        }
        if ($category !== null) {
            $post = $post->where('category_id', '=', $category);
        }
        $post = $post->orderBy('created_at', 'desc')->paginate(6);

        $categories = Category::all();
        $addresses = Address::all();
        return view('catalog.index', compact('post', 'categories','addresses'));
    }
}
