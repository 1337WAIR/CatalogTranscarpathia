@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Користувачі</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Головна</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Імя">
            </div>
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Пошта">
            </div>
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="Пароль">
            </div>
            @error('password')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="form-group" style="display: flex; justify-content: center;">
                <select class="select2-blue form-control" name="role">
                    <option value="0">Користувач</option>
                    <option value="1">Адмін</option>
                </select>
            </div>
            @error('role')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="submit" class="btn btn-primary" style="padding: 10px 60px" value="Додати">
            </div>
        </form>
    </div>
    <section class="content">
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
                                        <th>Ім'я</th>
                                        <th>ЕПошта</th>
                                        <th>Пароль</th>
                                        <th>Роль</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <form action="{{route('user.update',$user->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <td>
                                                    <input type="text" name="name" value="{{$user->name}}"
                                                           class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="email" value="{{$user->email}}"
                                                           class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="password" value="{{$user->password}}"
                                                           class="form-control">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <div class="form-group" style="display: flex; justify-content: center;">
                                                        <select class="select2-blue form-control" name="role">
                                                            <option value="0"<?php if ($user->role == 0) { echo ' selected'; } ?>>Користувач</option>
                                                            <option value="1"<?php if ($user->role == 1) { echo ' selected'; } ?>>Адмін</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn primary" value="РЕДАГУВАТИ">
                                                </td>
                                            </form>
                                            <td>
                                                <form action="{{route('user.delete',$user->id)}}" method="post">
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
    </section>
@endsection
















