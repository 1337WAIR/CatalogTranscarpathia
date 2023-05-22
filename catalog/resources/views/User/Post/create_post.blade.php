@extends('layouts.app')
@section('content')
    <div class="create_post_user">
        <form class="form_create" enctype="multipart/form-data" action="{{route('user.post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="main_post_create_title">Створення поста</h2>
            <div class="main_image_users_post">
                <h4>Додайте головне зображення</h4>
                <div class="input-file-container">
                    <input required class="input-file" type="file" name="main_image">
                    <label class="input-file-trigger" for="exampleInputFile">Виберіть зображення</label>
                </div>
            </div>
            <div>
                <h4>Заголовок</h4>
                <input required type="text" name="title" placeholder="Назва" value="{{ old('title') }}">
            </div>
            <div>
                <h4>Короткий опис</h4>
                <textarea required class="txtarea_main_content" name="main_content"></textarea>
            </div>
            <div>
                <h4>Вибір розташування</h4>
                <select name="address_id">
                    @foreach($addresses as $address)
                        <option class="option_style" value="{{$address->id}}">{{$address->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h4>Категорії</h4>
                <select name = "category_id" data-placeholder="Категорії" style="width: 100%;">
                    @foreach($categories as $category)
                        <option {{ is_array(old('categoryId')) && in_array($category->id, old('categoryId'))?'selected':'' }}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h4>Для чого</h4>
                <select name="where_id">
                    <option value="0">Блогу</option>
                    <option value="1">Каталогу</option>
                </select>
            </div>
            <h3 class="main_post_create_title">Створення статті</h3>
            <div class="Multiple">
                <div class="form-group post_back" >
                    <div class="input-file-container">
                        <input required class="input-file" type="file" name="content_image1">
                        <label class="input-file-trigger" for="exampleInputFile">Виберіть зображення</label>
                    </div>
                    <div class="summernote_mt" style="width: 100%">
                        <textarea  required style="width: 100%"  id="summernote" name="content1">{{old('content1')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group" style="display: flex; justify-content: center; color:red;">
                <input type="button" id = "addClone" value="Додати блок зображення та тексту">
            </div>
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="submit" class="btn btn-primary" value="Зберегти">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            let count = 1;
            $("#addClone").click(function() {
                count += 1;
                $(".Multiple").append(
                    '<div class="block_' + count + '">' +
                    '<div class="form-group post_back"">' +
                    '<div class="input-file-container">'+
                    '<input class="input-file" type="file" name="content_image' + count + '">'+
                    '<label class="input-file-trigger" for="exampleInputFile">Виберіть зображення</label>'+
                    '</div>'+
                    '<div class="form-group summernote_mt">' +
                    '<textarea id="summernote' + count + '" name="content' + count + '"></textarea>' +
                    '</div>' +
                    '<div class="del_block">' +
                    '<button class="del" data-block="' + count + '" type="button">ВИДАЛИТИ ДАНИЙ БЛОК</button>' +
                    '</div>'+
                    '</div>');
                $('#summernote' + count + '').summernote({});
                $(function() {
                    bsCustomFileInput.init();
                });
            });
            $(document).on('click', '.del', function() {
                const blockNum = $(this).data('block');
                $('.block_' + blockNum).remove();
            });
        });
    </script>
@endsection
