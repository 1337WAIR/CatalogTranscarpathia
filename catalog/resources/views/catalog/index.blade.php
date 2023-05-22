@extends('layouts.app')
@section('content')
<div class="content">
    <div class="search">
        <form class="search_form" method="get" action="{{route('catalog.search')}}" >
            <select name="address" id="sources" value="null" class="custom_select sources" placeholder="Розташування">
                @foreach($addresses as $address)
                    <option></option>
                    <option value="{{$address->id}}">{{$address->title}}</option>
                @endforeach
            </select>
            <select name="category" id="sources" class="custom_select sources" placeholder="Категорія">
                <option class="hidden"></option>
                @foreach($categories as $category)
                    <option></option>
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div class="search_input_wrapper">
                <input type="text" name="search" placeholder="Шукати тут...">
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>
        </form>
    </div>
    @if(count($post))
    <h2 class="main_title">@if(!isset($_GET['search']))Останні публікації каталогу
            @else Знайдені публікації..@endif</h2>
    <div class="main_content">
        <div class="card_block">
            @foreach($post as $posts)
                <form action="{{route('reading')}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$posts->id}}">
                    <button class="form_card" type="submit">
                        <div class="card_catalog">
                            <div class="card_image">
                                <img class="card_image" src="{{asset('storage/' . $posts->main_image)}}" alt="image_post">
                            </div>
                            <div class="post_title">
                                <h2>{{$posts->title}}</h2>
                            </div>
                        </div>
                    </button>
                </form>
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

