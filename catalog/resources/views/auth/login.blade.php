@extends('auth.layouts.main')

@section('content')
    <div class="container">
        <div class="form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <span class="main_text">ВХІД</span>
                <div class="input_txt">
                    <label>Введіть пошту</label>
                    <input placeholder="Введіть пошту" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                </div>
                <div class="input_txt">
                    <label>Введіть пароль</label>
                    <input placeholder="Введіть пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
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
                <div class="checkboxes__item">
                    <label class="checkbox style-e">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <div class="checkbox__checkmark"></div>
                        <div class="checkbox__body">Запамятати мене</div>
                    </label>
                </div>
                <div class="form_btn_dv">
                    <button type="submit" class="form_btn">УВІЙТИ</button>
                </div>
                <div class="reg"><a href="{{ route('register') }}">Зареєструватись?</a></div>
            </form>
        </div>
    </div>
@endsection
