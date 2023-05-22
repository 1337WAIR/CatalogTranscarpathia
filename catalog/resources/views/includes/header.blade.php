<div class="header">
    <a href="{{asset(route('blog.index'))}}" class="logo"> <img class="logo" src="{{asset('storage/main_image/logo1.png')}}" alt="logo"> </a>
    <ul class="navbarL">
        <li><a href="{{route('blog.index')}}" class="style_text">Блог</a></li>
        <li><a href="{{route('catalog.index')}}" class="style_text">Каталог</a></li>
        @if(auth()->check() && auth()->user()->role==1)
            <li><a href="{{route('main.index')}}" class="style_text">Адмін панель</a></li>
        @endif
    </ul>
    <ul class="navbarR">
        @if (!Auth::guest())
            <div class="dropdown_user">
                <li class="dropbtnn"><a class="style_text">{{auth()->user()->name}}<i class="ri-arrow-down-s-line"></i></a></li>
                <div class="dropdown-content">
                    <a href="{{route('liked.index')}}">Вподобані</a>
                    <a href="{{route('accountdata.index')}}">Налаштування</a>
                    <a href="{{route('user.post.index')}}">Мої пости</a>
                    <a href="{{route('user.post.create')}}">Створити пост</a>
                </div>
            </div>
        @endif
        @if (Auth::guest())
            <li><a class="style_text" href="{{route('login')}}"><i class="ri-user-received-2-line"></i>Увійти</a></li>
            <li><a class="style_text" href="{{route('register')}}">Реєстрація</a></li>
        @endif
        <li>
            @if (!Auth::guest())
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="style_text"><i class="ri-arrow-left-circle-line"></i>Вийти</button>
                </form>
            @endif
        </li>
    </ul>
    <div id="menuHeader"><i class="ri-menu-line"></i></div>
    <div class="dropdown">
        <div class="dropdownHiden">
            @if (Auth::guest())
                <li><a class="style_text" href="{{route('login')}}">Увійти</a></li>
                <li><a class="style_text" href="{{route('register')}}">Реєстрація</a></li>
            @else
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="style_text">Вийти</button>
                    </form>
                </li>
            @endif
        </div>
        <li><a href="{{route('blog.index')}}" class="style_text">Блог</a></li>
        <li><a href="{{route('catalog.index')}}" class="style_text">Каталог</a></li>
        @if(auth()->check() && auth()->user()->role==1)
            <li><a href="{{route('main.index')}}" class="style_text">Адмін панель</a></li>
        @endif
        @if (!Auth::guest())
            <li><a class="style_text" href="{{route('liked.index')}}">Вподобані</a></li>
            <li><a class="style_text" href="{{route('accountdata.index')}}" >Налаштування</a></li>
            <li><a class="style_text"href="{{route('user.post.index')}}">Мої пости</a></li>
        @endif
    </div>
</div>

