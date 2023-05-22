<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostContent;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class StoreController extends Controller
{
    //
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validate([
                'main_content'=>'required|string',
                'title'=>'required|string',
                'main_image'=>'file',
                'category_id'=>'nullable|string',
                'address_id'=>'required|string',
                'where_id'=>'required|string',
            ]);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $data = $request->all();
            $id_post = $post['id'];
            for ($i = 1; $i < count( $data); $i++) {
                $content = [
                    'post_id' => $id_post,
                    'num' => $i,
                    'image_patch' => '',
                    'image_title'=> '',
                ];
                if (isset($data['content_image'.$i])) {
                    $path = Storage::disk('public')->put('/images', $data['content_image'.$i]);
                    $content['image_patch'] = $path;
                }
                if (isset($data['content'.$i])) {
                    $content['image_title']=$data['content'.$i];
                }
                if($content['image_patch']!='' || $content['image_title']!=''){
                    PostContent::create($content);
                }
            }
        }catch (\Exception $exception){
            abort(404);
        }
        return redirect()->route('post.index');
    }
}
