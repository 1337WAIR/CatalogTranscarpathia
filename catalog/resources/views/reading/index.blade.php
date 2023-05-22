@extends('layouts.app')
@section('content')
<div class="content">
    <div class="content_post">
        <div class="info_block_post">
            @if(isset($users->name))
                <span>Автор: {{$users->name}}</span>
            @else
                <span>Автор: Admin</span>
            @endif
            <span>Створено: {{date('Y-m-d', strtotime($post->created_at))}}</span>
        </div>
        <hr class="hr_line_post">
        <div class="main_content_post">
            <h1 class="main_title_post_read">{{$post->title}}</h1>
            <div class="img_block">
                <img class="img_class" src="{{asset('storage/'.$post->main_image)}}">
            </div>
            <span class="title"> {{$post->main_content}}</span>
            @foreach($post_content as $contents)
                @if($contents->image_patch!=null)
                    <div class="img_block">
                        <img class="img_class" src="{{asset('storage/'.$contents->image_patch)}}">
                    </div>
                @endif
                @if($contents->image_title!=null)
                    <span class="title_content"> {!!$contents->image_title!!}</span>
                @endif
            @endforeach
        </div>
        <div class="new_obj_post">
        </div>
    </div>
</div>
@endsection

