@extends('layouts.app')
@section('content')
    <div class="create_post_user">
        <form  class="form_create" action="{{route('user.post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <h2 class="main_post_create_title">Редагування поста</h2>
            <div class="main_image_users_post">
                <div>
                    <h4>Поточне головне зображення</h4>
                    <img class="img_class" src="{{asset('storage/'.$post->main_image)}}">
                </div>
                <div class="input-file-container">
                    <input class="input-file" type="file" name="main_image">
                    <label class="input-file-trigger" for="exampleInputFile">Змінити зображення</label>
                </div>
            </div>
            <div>
                <h4>Поточний заголовок</h4>
                <input required type="text" name="title" placeholder="Назва" value="{{$post->title}}">
            </div>
            <div>
                <h4>Поточний короткий опис</h4>
                <textarea required class="txtarea_main_content" name="main_content">{{$post->main_content}}</textarea>
            </div>
            <div>
                <h4>Вибір розташування</h4>
                <select name="address_id">
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}" {{ $address->id == $post->address_id ? 'selected' : '' }}> {{ $address->title }}  </option>
                    @endforeach
                </select>
            </div>
            <div>
                <h4>Категорії</h4>
                <select name = "category_id" data-placeholder="Категорії" style="width: 100%;">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h4>Для чого</h4>
                <select name="where_id">
                    <option value="0" {{ $post->where_id == 0 ? 'selected' : '' }}>Блогу</option>
                    <option value="1" {{ $post->where_id == 1 ? 'selected' : '' }}>Каталогу</option>
                </select>
            </div>
            <h3 class="main_post_create_title">Контент поста</h3>
            <div class="Multiple">
                @php($countt = 0)
                @foreach($post_content as $contents)
                    @php($countt+=1)
                    <div>
                        @if($contents->image_patch!=null)
                            <img class="img_class" src="{{asset('storage/'.$contents->image_patch)}}">
                            <input type="hidden" value="{{$contents->image_patch}}" name="content_image{{$countt}}_old">
                        @endif
                        <div class="input-file-container">
                            <input class="input-file" type="file" name="content_image{{$countt}}">
                            <label class="input-file-trigger" for="exampleInputFile">Змінити зображення</label>
                        </div>
                    </div>
                    <div class="textarea_block" id="summernote{{$countt}}">
                        {!!$contents->image_title!!}
                    </div>
                    <textarea class="main_title_ed" name="content{{$countt}}" style="display: none;">{!!$contents->image_title!!}</textarea>
                @endforeach
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
        let count={{$countt}};
        $(document).ready(function (){
            $("#addClone").click(function (){
                count+=1;
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
        });
    </script>
@endsection
