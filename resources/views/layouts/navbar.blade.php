<link href="{{ asset('css/HomePage/Navbar.css') }}" rel="stylesheet" type="text/css">
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home',app()->getLocale())}}">
        <img src="{{asset('storage/cybridgeasia.png')}}" alt="England Flag" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
        <ul class="navbar-nav">
            <li class="nav-item active ">
                <a class="nav-link" href="{{route('home',app()->getLocale())}}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span></span>
                    </i>

                    {{ __('Account')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{route('login',app()->getLocale())}}">
                        <i class="fas fa-sign-in-alt"></i> &ensp; {{ __('Login')}}
                    </a>
                    <a class="dropdown-item" href="{{route('register',app()->getLocale())}}">
                        <i class="far fa-registered"></i> &ensp; {{ __('Register')}}
                    </a>

                </div>
            </li>
        </ul>
        <ul class="navbar-nav  mr-auto ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag">
                        <span></span>
                    </i>
                    {{ __('Language')}}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en'])}}">
                        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp'])}}">
                        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi'])}}">
                        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
                    </a>
                </div>
            </li>
        </ul>
        @else
        <ul class="navbar-nav  ">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home',app()->getLocale()) }}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>

        <ul class="navbar-nav">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-user">
                        <span></span>
                    </i>
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu">
                    <a href="{{route('profile.view',['locale'=>app()->getLocale(),'user'=>Auth::user()->name])}}">
                        <p class="dropdown-item"><i class="fas fa-user-tie"></i>&ensp;{{__('Profile')}}</p>
                    </a>
                    @if(Auth::user()->role == 'Admin')
                    <a href="{{route('admin.dashboard',['locale'=>app()->getLocale(),'date'=>'Month'])}}">
                        <p class="dropdown-item"><i class="fas fa-user-secret"></i>&ensp;{{__('Dashboard')}}</p>
                    </a>

                    <a class="dropdown-item" href="{{ route('logout',app()->getLocale()) }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt">
                            <span></span>
                        </i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a class="dropdown-item" href="{{ route('logout',app()->getLocale()) }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt">
                            <span></span>
                        </i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </div>
            </li>
        </ul>

        <ul class="navbar-nav  ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag">
                        <span></span>
                    </i>
                    {{ __('Language')}}
                </a>
                @yield('language')

            </li>
        </ul>
        @if(Auth::user()->email_verified_at == NULL)

        @else
        <ul class="navbar-nav  mr-auto">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-bell">
                        <span class="badge badge-info">{{$notifications->count()}}</span>
                    </i>
                    {{__('Notifications')}}
                </a>
                <div class="dropdown-menu">
                    @foreach($notifications->take(4) as $noti)
                    <p class="dropdown-item">{{json_decode(json_encode($noti->data))->data}}</p>

                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    @endforeach
                    <a href="{{route('notifications.all',['locale'=>app()->getLocale()])}}">
                        <button class="dropdown-item btn-info">{{__('All Unread Messages')}}</button>
                    </a>

                </div>
            </li>

        </ul>
        @endif
        @endif
    </div>
</nav>