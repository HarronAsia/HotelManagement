@extends('layouts.app')

@section('language')
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
@endsection

@section('content')
<link href="{{ asset('css/mainpage.css') }}" rel="stylesheet" type="text/css">


@include('Homepage.Video')

@include('Homepage.search')

@include('Homepage.Room_Slide')

@include('Homepage.Category_Slide')

@include('Homepage.services')

@endsection