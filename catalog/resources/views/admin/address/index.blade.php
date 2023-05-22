@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Адреси</h1>
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
        <form action="{{route('address.store')}}" method="post">
            @csrf
            <div class="form-group" style="display: flex; justify-content: center;">
                <input type="text" name="title" class="form-control" placeholder="Назва" value="{{old('title')}}">
            </div>
            @error('title')
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
                                        <th>Назва</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <td>{{$address->id}}</td>
                                            <form action="{{route('address.update', $address->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <td>
                                                    <input type="text" name="title" value="{{$address->title}}"
                                                           class="form-control">
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn primary" value="РЕДАГУВАТИ">
                                                </td>
                                            </form>
                                            <td>
                                                <form action="{{route('address.delete',$address->id)}}" method="post">
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
















