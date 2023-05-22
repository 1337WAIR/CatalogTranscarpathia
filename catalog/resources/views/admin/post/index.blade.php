@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1 class="main-title">Пости</h1>
        <h2 class="main_post_create_title">Створення поста</h2>
        <form enctype="multipart/form-data" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Головне зображення</h4>
            <div class="custom-file">
                <input required type="file" class="custom-file-input" name="main_image">
                <label class="custom-file-label" for="exampleInputFile">Виберіть зображення</label>
            </div>
            <h4>Заголовок</h4>
            <div class="custom-file">
                <input required type="text" name="title" class="form-control" placeholder="Назва" value="{{ old('title') }}">
            </div>
            <h4>Короткий опис</h4>
            <div class="custom-file">
                <textarea required class="main_title" name="main_content"></textarea>
            </div>
            <h4>Вибір розташування</h4>
            <div class="custom-file">
                <div class="form-group" style="display: flex; justify-content: center;">
                    <select class="select2-blue form-control" name="address_id">
                        @foreach($addresses as $address)
                            <option value="{{$address->id}}">{{$address->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <h4>Категорії</h4>
            <div class="custom-file">
                <div class="form-group">
                    <select class="select2-blue form-control" name = "category_id" data-placeholder="Категорії" style="width: 100%;">
                        @foreach($categories as $category)
                            <option {{ is_array(old('categoryId')) && in_array($category->id, old('categoryId'))?'selected':'' }}} value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <h4>Для чого</h4>
            <div class="custom-file">
                <div class="form-group" style="display: flex; justify-content: center;">
                    <select class="select2-blue form-control" name="where_id">
                        <option value="0">Блогу</option>
                        <option value="1">Каталогу</option>
                    </select>
                </div>
            </div>
            <h3 class="main_article_create_title">Створення статті</h3>
            <div class="Multiple">
                <div class="form-group post_back" >
                    <div class="custom-file">
                        <input required type="file" class="custom-file-input" name="content_image1">
                        <label class="custom-file-label" for="exampleInputFile">Виберіть зображення</label>
                    </div>
                    <div class="form-group summernote_mt">
                        <textarea class="" required id="summernote" name="content1">{{old('content1')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group" style="display: flex; justify-content: center; color:red;">
                <input type="button" class="btn btn-primary" id = "addClone" style="padding: 10px 60px" value="Додати блок зображення та тексту">
            </div>
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="submit" class="btn btn-primary" style="padding: 10px 60px" value="Зберегти">
            </div>
        </form>
    </div>
    <h2 class="main_article_create_title">Всі пости</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th>Головне зображення</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>
                                                <span> {{$post->title}}</span>
                                            </td>
                                            <td>
                                                <img src="{{asset('storage/' . $post->main_image)}}" alt="main_image" style="width: 100px" >
                                            </td>
                                            <td>
                                                <a class="btn btn primary" href="{{route('post.edit',$post->id)}}">РЕДАГУВАТИ</a>
                                            </td>

                                            <td>
                                                <form action="{{route('post.delete',$post->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn primary" value="ВИДАЛИТИ">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function() {
            let count = 1;
            $("#addClone").click(function() {
                count += 1;
                $(".Multiple").append(
                    '<div class="block_' + count + '">' +
                    '<div class="form-group post_back"">' +
                    '<div class="custom-file">' +
                    '<input type="file" class="custom-file-input" name="content_image' + count + '">' +
                    '<label class="custom-file-label" for="exampleInputFile">Виберіть зображення</label>' +
                    '</div>' +
                    '<div class="form-group summernote_mt">' +
                    '<textarea id="summernote' + count + '" name="content' + count + '"></textarea>' +
                    '</div>' +
                    '<div class="del_block">' +
                    '<button class="del btn btn-primary" data-block="' + count + '" type="button">ВИДАЛИТИ ДАНИЙ БЛОК</button>' +
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
    </section>
@endsection
