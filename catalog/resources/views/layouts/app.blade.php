<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('plugins/summernote/summernote-bs4.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataaccount/style_dataaccount.css') }}" rel="stylesheet">
    <link href="{{ asset('css/liked/style_liked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reading/style_reading.css') }}" rel="stylesheet">
    <link href="{{ asset('css/UserPost/style_create_post_user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/UserPost/style_edit_post_user.css') }}" rel="stylesheet">
    <title>CATALOG</title>
</head>
<body>
<div class="wrapper">
    <div class="header">
        @include('includes.header')
    </div>
    <div id="app" class="main">
        @yield('content')
    </div>
    <div class="footer">
        @include('includes.footer')
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src ="{{asset('js/dropdownMenu.js')}}"></script>
<script src ="{{asset('js/select.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src ="{{asset('js/admin/summernote_settings.js')}}"></script>
<script src ="{{asset('js/admin/select2_init.js')}}"></script>
<script src ="{{asset('js/admin/input_file_init.js')}}"></script>
</body>
</html>
