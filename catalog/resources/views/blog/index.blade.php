@extends('layouts.app')
@section('content')
<div class="content">
    <div class="search">
        <form class="search_form" method="get" action="{{route('search')}}">
            <div class="search_input_wrapper">
                <input class="input_search" type="text" name="search" placeholder="Шукати тут...">
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>
        </form>
    </div>
    @if(count($post))
        <h2 class="main_title">@if(!isset($_GET['search']))Останні публікації блогу та каталогу
            @else Знайдені публікації..@endif</h2>
    <div class="main_content">
        <div class="card_block">
            @foreach($post as $posts)
                <div class="card">
                    <div class="card_image">
                        <img class="card_image" src="{{asset('storage/' . $posts->main_image)}}" alt="image_post">
                        <form class="form_block" action="{{route('like.store',$posts->id)}}" method="post">
                            @csrf
                            <button type="submit">
                                <i
                                @auth()
                                    @if(auth()->user()->likedPosts->contains($posts->id))
                                        style="color:#00B025;"
                                    @endif
                                @endauth
                                 class="ri-heart-3-fill">
                                </i>
                            </button>
                        </form>
                    </div>
                    <div class="post_title">
                        <h2>{{$posts->title}}</h2>
                    </div>
                    <div class="post_content">
                        <p>{{$posts->main_content}}</p>
                    </div>
                    <form class="form_block" action="{{route('reading')}}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$posts->id}}">
                        <input class="btn_btn-primary" type="submit" class="button" value="ЧИТАТИ ДАЛІ">
                    </form>
                    <div class="button"></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination">
        {{ $post->appends(['search' => request()->search])->links() }}
    </div>
    @else
        <h2 class="main_title">Публікацій не знайдено...</h2>
    @endif
</div>
@endsection

