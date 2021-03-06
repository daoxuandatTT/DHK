<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('page.index')}}">MoonLight</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="container">
                        <form action="{{route('post.search')}}" class="search-form" method="post">
                            @csrf
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search" style=";width: 270px">
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item active"><a href="{{route('page.index')}}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{route('page.showPostShare')}}" class="nav-link">Mẹo Làm Bếp</a></li>
                <li class="nav-item"><a href="{{route('page.contact')}}" class="nav-link">Liên Hệ</a></li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng kí') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item"><a href="{{route('page.myPost')}}" class="nav-link">Bài viết của tôi</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('page.myProfile',Auth::user()->id)}}">Thông tin cá nhân</a>
                            @if(Auth::user()->provider!=="facebook" && Auth::user()->provider!=='google')
                            <a class="dropdown-item" href="{{route('page.editPassword',Auth::user()->id)}}">Đổi mật khẩu</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


        </div>
    </div>
</nav>
