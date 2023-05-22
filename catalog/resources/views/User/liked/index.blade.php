@extends('layouts.app')
@section('content')
<div class="content">

    @if(count($post))
        <h2 class="main_title">@if(!isset($_GET['search']))Вподобані публікації
            @else Знайдені публікації..@endif</h2>
    <div class="main_content">
        <div class="card_block_lkd">
            @foreach($post as $posts)
                <div class="card_lkd">
                    <div class="card_image_lkd">
                        <img class="card_image_lkd" src="{{asset('storage/' . $posts->main_image)}}" alt="image_post">
                    </div>
                    <div class="title_block">
                        <div class="post_title_lkd">
                            <h2>{{$posts->title}}</h2>
                        </div>
                        <div class="post_content_lkd">
                            <p>Опис: {{$posts->main_content}}</p>
                        </div>
                        <div class="del_block">
                            <form action="{{route('liked.delete', $posts->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="del_btn" type="submit"><i class="ri-delete-bin-line"></i></button>
                            </form>
                        </div>
                    </div>
                    <form class="form_block_hr" action="{{route('reading')}}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$posts->id}}">
                        <input class="btn-primary_hr" type="submit" value="ПЕРЕГЛЯНУТИ">
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <h2 class="main_title">Немає вподобаних постів!</h2>
    @endif
</div>
@endsection


