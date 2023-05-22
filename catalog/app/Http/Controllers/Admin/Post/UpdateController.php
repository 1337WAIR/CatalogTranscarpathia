<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\PostContent;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    //
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validate([
            'main_content'=>'required|string',
            'title'=>'required|string',
            'main_image'=>'file',
            'category_id'=>'nullable|string',
            'address_id'=>'required|string',
            'where_id'=>'required|string',
        ]);
        if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }
        $post->update($data);

        $data = $request->all();
        $id_post = $post['id'];
        PostContent::where('post_id', $id_post)->delete();
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
            }else if(isset($data['content_image'.$i.'_old'])){
                $path = $data['content_image'.$i.'_old'];
                $content['image_patch'] = $path;
            }
            if (isset($data['content'.$i])) {
                $content['image_title']=$data['content'.$i];
            }
            if($content['image_patch']!='' || $content['image_title']!=''){
                PostContent::create($content);
            }
        }
        return redirect()->route('post.index');
    }
}
