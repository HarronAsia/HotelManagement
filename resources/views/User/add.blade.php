@extends('layouts.app')

@section('title','Add new Information')

@section('language')
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en','user'=>$user->name])}}">
        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp','user'=>$user->name])}}">
        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi','user'=>$user->name])}}">
        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
    </a>
</div>
@endsection

@section('content')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.css">
<!-- partial -->
<div class="main-panel">
    <div class="container-fluid">

        <form action="{{route('profile.store',$user->name)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="profile-card">

                            <div class="profile-header">
                                <div class="cover-image">

                                    <div class="form-group has-feedback{{ $errors->has('avatar_image') ? ' has-error' : '' }}">
                                        <label class="custom-file avatar_image">
                                            <img id="image_preview_container" src="{{asset('storage/user.png')}}" class="img" alt="preview Avatar Image" style="width: 380px; height:150px;">
                                            <input type="file" name="avatar_image" id="image" class="form-control" style="display: none;">

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-content">
                                <div class="form-group">
                                    <div class="all_button">
                                        <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                                        <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                                        <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="card-title font-weight-bold">About</p>
                                </div>
                            </div>
                            <hr>
                            <p class="card-description">User Information</p>
                            <ul class="about">
                                <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Name:</span><span class="about-item-detail">{{$user->name}}</span></li>
                                <li class="about-items"><i class="mdi mdi-mail-ru icon-sm "></i><span class="about-item-name">username:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <input type="text" name="username" class="form-control" placeholder="Please Enter Your UserName">
                                        </div>
                                    </span>
                                </li>
                                <li class="about-items"><i class="mdi mdi-format-align-left icon-sm "></i><span class="about-item-name">Bio:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('bio') ? ' has-error' : '' }}">
                                            <textarea name="bio" class="form-control" placeholder="Please Enter Your Short Introduction"></textarea>
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-trophy-variant-outline icon-sm "></i><span class="about-item-name">Badges:</span><span class="about-item-detail">
                                        <button type="button" class="btn btn-success btn-rounded btn-icon">
                                            <i class="mdi mdi-star text-white"></i>
                                        </button>
                                        <button type="button" class="btn btn-info btn-rounded btn-icon">
                                            <i class="mdi mdi-check text-white"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                            <i class="mdi mdi-check text-white"></i>
                                        </button>
                                    </span>
                                </li>
                            </ul>

                            <p class="card-description">Contact Information</p>
                            <ul class="about">
                                <li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Phone:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('number') ? ' has-error' : '' }}">
                                            <input type="tel" name="number" class="form-control" placeholder="Please Enter Your Phone Number">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span class="about-item-name">Address:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('place') ? ' has-error' : '' }}">
                                            <input type="text" name="place" class="form-control" placeholder="Please Enter Your Address">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span>
                                    <span class="about-item-detail">
                                        {{$user->email}}
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Google Plus Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}">
                                            <input type="text" name="google_plus_link" class="form-control" placeholder="Please Enter Your Google Plus Link">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Yahoo Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}">
                                            <input type="text" name="yahoo_link" class="form-control" placeholder="Please Enter Your Yahoo Link">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Skype Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}">
                                            <input type="text" name="skype_link" class="form-control" placeholder="Please Enter Your Skype Link">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Facebook Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}">
                                            <input type="text" name="facebook_link" class="form-control" placeholder="Please Enter Your Facebook Link">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Twitter Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}">
                                            <input type="text" name="twitter_link" class="form-control" placeholder="Please Enter Your Twitter Link">
                                        </div>
                                    </span>
                                </li>

                                <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Instagram Link:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('instagram_link') ? ' has-error' : '' }}">
                                            <input type="text" name="instagram_link" class="form-control" placeholder="Please Enter Your Instagram Link">
                                        </div>
                                    </span>
                                </li>
                            </ul>

                            <p class="card-description">Basic Information</p>
                            <ul class="about">
                                <li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Birthday:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                                            <input type="date" name="dob" class="form-control" placeholder="Please Enter Your Date Of Birth">
                                        </div>
                                    </span>
                                </li>
                                <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Gender:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="Male">{{__('Male')}}</option>
                                                <option value="Female">{{__('Female')}}</option>
                                                <option value="Third Party">{{__('Third Party')}}</option>
                                            </select>
                                        </div>
                                    </span>
                                </li>
                                <li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span class="about-item-name">Profession:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('job') ? ' has-error' : '' }}">
                                            <input type="text" name="job" class="form-control" placeholder="Please Enter Your Profession">
                                        </div>
                                    </span>
                                </li>
                                <li class="about-items"><i class="mdi mdi-water icon-sm "></i><span class="about-item-name">Blood Group:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('blood') ? ' has-error' : '' }}">
                                            <select class="form-control" name="blood" id="blood">
                                                <option value="A">{{__('A')}}</option>
                                                <option value="B">{{__('B')}}</option>
                                                <option value="AB">{{__('AB')}}</option>
                                                <option value="O">{{__('O')}}</option>
                                            </select>
                                        </div>
                                    </span>
                                </li>
                                <li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span class="about-item-name">Relationship Status:</span>
                                    <span class="about-item-detail">
                                        <div class="form-group has-feedback{{ $errors->has('relationship') ? ' has-error' : '' }}">
                                            <select class="form-control" name="relationship" id="relationship">
                                                <option value="Single">{{__('Single')}}</option>
                                                <option value="In Relationship">{{__('In Relationship')}}</option>
                                                <option value="Married">{{__('Married')}}</option>
                                                <option value="Just Divorced">{{__('Just Divorced')}}</option>
                                            </select>
                                        </div>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection