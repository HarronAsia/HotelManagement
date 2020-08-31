@extends('layouts.app')

@section('title',$bed)

@section('language')
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en','category'=>$bed])}}">
        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp','category'=>$bed])}}">
        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi','category'=>$bed])}}">
        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
    </a>
</div>
@endsection

@section('content')
<script src="https://www.cssscript.com/demo/animated-customizable-range-slider-pure-javascript-rslider-js/js/rSlider.min.js"></script>
<link href="{{ asset('css/Category.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/Category.js') }}"></script>

<section class="listings">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('Category.search')
            </div>
            <div class="col-md-9">
               @include('Category.result')
            </div>
        </div>
    </div>
</section>

@endsection