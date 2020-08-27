<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Forgot Password</title>
<link href="{{ asset('css/Auth/reset_password.css') }}" rel="stylesheet" type="text/css">

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">
            <a href="{{route('home',app()->getLocale())}}">
                <img src="{{asset('storage/cybridgeasia.png')}}" alt="logo" style="width: 200px;height:200px;">
            </a>
        </h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form id="login-form" class="form" method="POST" action="{{ route('login',app()->getLocale()) }}">
                            @csrf

                            <h3 class="text-center text-info">{{ __('Reset Password') }}</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-info btn-md" value="{{ __('Send Password Reset Link') }}">
                            </div>
                            <div class="form-group">
                                <div id="register-link" class="text-right">
                                    <a href="{{route('login',app()->getLocale())}}" class=" text-info">Login here</a>
                                    <span>|</span>
                                    <a href="{{route('register',app()->getLocale())}}" class=" text-info">Register here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>