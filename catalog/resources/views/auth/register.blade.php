@extends('auth.layouts.main')

@section('content')
    <div class="container">
        <div class="form_reg">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <span class="main_text">РЕЄСТРАЦІЯ</span>
                <div class="input_txt">
                    <label>Введіть логін</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                </div>
                <div class="input_txt">
                    <label>Введіть пошту</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                </div>
                <div class="input_txt">
                    <label>Введіть пароль</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                </div>
                <div class="input_txt">
                    <label>Підтвердіть пароль</label>
                    <input id="password-confirm" type="password" name="password_confirmation"  autocomplete="new-password">
                </div>
                <div class="errorMesage">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="errorMesage">{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="errorMesage">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form_btn_dv">
                    <button type="submit" class="form_btn">ЗАРЕЄСТРУВАТИСЬ</button>
                </div>
                <div class="reg"><a href="{{ route('login') }}">Увійти?</a></div>
            </form>
        </div>
    </div>
@endsection
