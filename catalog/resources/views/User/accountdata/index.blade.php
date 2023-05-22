@extends('layouts.app')
@section('content')
<div class="content">
    <form class="form_data" action="{{route('account.update',auth()->user()->id)}}" method="post">
        @csrf
        @method('patch')
        <h2>Змінити дані облікового запису</h2>
        <input class="txt_form" type="text" value="{{auth()->user()->name}}" name="name">
        <input class="txt_form" type="text" value="{{auth()->user()->email}}" name="email">
        <h2>Змінити пароль</h2>
        <input class="txt_form" type="password" placeholder="Введіть новий пароль" name="password">
        <input class="txt_form" type="password" placeholder="Підтвердіть пароль" name="confirm_password">
        @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
        @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
        @error('confirm_password')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <input class="btn_inp" type="submit" value="Зберегти зміни">
    </form>
</div>
@endsection

