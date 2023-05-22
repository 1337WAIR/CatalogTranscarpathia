@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1 class="main-title">Пости</h1>
        <h2 class="main_post_create_title">Редагування поста</h2>
        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <div>
                    <h4>Поточне головне зображення</h4>
                    <img class="img_class" src="{{asset('storage/'.$post->main_image)}}">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image">
                    <label class="custom-file-label" for="exampleInputFile">Змінити головне зображення</label>
                </div>
            </div>
            <div class="custom-file">
                <h4>Поточний заголовок</h4>
                <input required type="text" name="title" class="form-control" placeholder="Назва" value="{{$post->title}}">
            </div>
            <div class="main_title_block">
                <h4>Поточний короткий опис</h4>
                <textarea class="main_title_ed" name="main_content">{{$post->main_content}}</textarea>
            </div>
            <div class="custom-file">
                <h4>Вибір розташування</h4>
                <select class="select2-blue form-control" name="address_id">
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}" {{ $address->id == $post->address_id ? 'selected' : '' }}> {{ $address->title }}  </option>
                    @endforeach
                </select>
            </div>
            <div class="custom-file">
                <h4>Категорії</h4>
                <select class="select2-blue form-control" name = "category_id" data-placeholder="Категорії" style="width: 100%;">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="custom-file">
                <h4>Для чого</h4>
                <select class="select2-blue form-control" name="where_id">
                    <option value="0" {{ $post->where_id == 0 ? 'selected' : '' }}>Блогу</option>
                    <option value="1" {{ $post->where_id == 1 ? 'selected' : '' }}>Каталогу</option>
                </select>
            </div>
            <div class="content_txt_title">
                <h2 class="title_content_block">Контент поста</h2>
            </div>
            <div class="Multiple">
                @php($countt = 0)
                @foreach($post_content as $contents)
                    @php($countt+=1)
                    <div class="custom-file ">
                        @if($contents->image_patch!=null)
                            <img class="img_class" src="{{asset('storage/'.$contents->image_patch)}}">
                            <input type="hidden" value="{{$contents->image_patch}}" name="content_image{{$countt}}_old">
                        @endif
                        <div class="custom-file input_content ">
                            <input type="file" class="custom-file-input input_content" name="content_image{{$countt}}">
                            <label class="custom-file-label input_content" for="exampleInputFile">Змінити зображення</label>
                        </div>
                    </div>
                    <div class="textarea_block" id="summernote{{$countt}}">
                        {!!$contents->image_title!!}
                    </div>
                    <textarea class="main_title_ed" name="content{{$countt}}" style="display: none;">{!!$contents->image_title!!}</textarea>
                @endforeach
            </div>
            <div class="form-group" style="display: flex; justify-content: center; color:red;">
                <input type="button" class="btn btn-primary" id = "addClone" style="padding: 10px 60px" value="Додати поля зображення та тексту">
            </div>
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="submit" class="btn btn-primary" style="padding: 10px 60px" value="Зберегти">
            </div>
        </form>
        <script>
            let count={{$countt}};
            $(document).ready(function (){
                $("#addClone").click(function (){
                    count+=1;
                    $(".Multiple").append('<div class="block_' + count + '">' +
                        '<div class="custom-file content_block">' +
                        '<input type="file" class="custom-file-input input_content" name="content_image'+count+'">' +
                        ' <label class="custom-file-label" for="exampleInputFile">Виберіть зображення</label>' +
                        '</div>' +
                        '<textarea class="main_title_ed" id="summernote'+count+'" name="content'+count+'"></textarea>'+
                        '<div class="del_block">' +
                        '<button class="del btn btn-primary" data-block="' + count + '" type="button">ВИДАЛИТИ ДАНИЙ БЛОК</button>' +
                        '</div>' +
                        '</div>');
                    $('#summernote'+count+'').summernote({});
                    $(function() {
                        bsCustomFileInput.init();
                    });
                    $(document).on('click', '.del', function() {
                        const blockNum = $(this).data('block');
                        $('.block_' + blockNum).remove();
                    });
                });
            });
            $(document).ready(function() {
                @for ($i = 1; $i <= $countt; $i++)
                $('#summernote{{$i}}').summernote({
                    height: 200,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $('textarea[name="content{{$i}}"]').val(contents);
                        }
                    }
                });
                $(function() {
                    bsCustomFileInput.init();
                });
                @endfor
            })
        </script>
    </div>
@endsection
