<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home',app()->getLocale())}}">
        <img src="{{asset('storage/cybridgeasia.png')}}" alt="England Flag" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard',['locale'=>app()->getLocale(),'date'=>'Month'])}}" title="{{__('Dashboard')}}"><i class="fas fa-cube"></i> &ensp; {{__('Dashboard')}} <i class="fas fa-cube shortmenu animate"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.monitoring',app()->getLocale())}}" title="{{__('Monitoring')}}"><i class="fas fa-desktop"></i>&ensp; {{__('Monitoring')}} <i class="fas fa-desktop shortmenu animate"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.calendar',app()->getLocale())}}" title="{{__('Calendar')}}"><i class="fas fa-calendar "></i>&ensp; {{__('Calendar')}} <i class="fas fa-calendar shortmenu animate"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.notification',app()->getLocale())}}" title="{{__('Notification')}}"><i class="far fa-envelope "></i>&ensp; {{__('Notification')}} <i class="far fa-envelope shortmenu animate"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.searching',app()->getLocale())}}" title="{{__('Feedback')}}"><i class="fas fa-search-location"></i>&ensp; {{__('Searching')}} <i class="fas fa-search-location shortmenu animate"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav  ">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home',app()->getLocale()) }}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>

        <ul class="navbar-nav ">
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
        <ul class="navbar-nav mr-auto">
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
    </div>
</nav>