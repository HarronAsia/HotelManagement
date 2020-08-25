<link href="{{ asset('css/HomePage/navbar.css') }}" rel="stylesheet" type="text/css">
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">
        <img src="{{asset('storage/cybridgeasia.png')}}" alt="England Flag" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span></span>
                    </i>
                    {{ __('Account')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i> &ensp; {{ __('Login')}}
                    </a>
                    <a class="dropdown-item" href="{{route('register')}}">
                        <i class="far fa-registered"></i> &ensp; {{ __('Register')}}
                    </a>

                </div>
            </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" method="GET" action="#">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
        </form>


        @else
        <ul class="navbar-nav  mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
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
                    <a href="{{route('profile.view',Auth::user()->name)}}">
                        <p class="dropdown-item"><i class="fas fa-user-tie"></i>&ensp;{{__('Profile')}}</p>
                    </a>
                    @if(Auth::user()->role == 'Admin')
                    <a href="{{route('admin.dashboard','Month')}}">
                        <p class="dropdown-item"><i class="fas fa-user-secret"></i>&ensp;{{__('Dashboard')}}</p>
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt">
                            <span></span>
                        </i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt">
                            <span></span>
                        </i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </div>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="GET" action="#">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
        </form>


        @endif
    </div>
</nav>