<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href=" {{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href=" {{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('adminLTE/dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/summernote/summernote-bs4.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }} ">
    <link href="{{ asset('css/admin/style_edit_post.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style_index_post.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a class="brand-link" href="{{route('main.index')}}">
            <span class="brand-text font-weight-light">ZakCatalog</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('blog.index')}}" class="nav-link">
                            <i class="fas fa-home"></i>
                            <p>
                                На головну
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                Користувачі
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            <i class="fas fa-th-list"></i>
                            <p>
                                Категорії
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('address.index')}}" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>
                                Адреси
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('post.index')}}" class="nav-link">
                            <i class="far fa-newspaper"></i>
                            <p>
                                Пости
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2021-{{now()->year}}. <a href="{{route('main.index')}}">ZakCatalog</a></strong>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }} "></script>
<script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('js/admin/summernote_settings.js')}}"></script>
<script src="{{ asset('js/admin/select2_init.js')}}"></script>
<script src="{{ asset('js/admin/input_file_init.js')}}"></script>
</body>
</html>
