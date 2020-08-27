@extends('layouts.admin.app')

@section('title','Monitoring')

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

<link href="{{ asset('css/admin/monitoring.css') }}" rel="stylesheet" type="text/css">
<section class="feature-area">
    <div class="container-fluid">
        <div class="row feature-box">
            <!--*************************************** USER ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">01</span>
                    <span class="flaticon-003-target feature__icon">{{$users->count()}}</span>
                    <h3 class="feature__title">
                        <a href="{{route('admin.users',app()->getLocale())}}">User</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->
            <!--*************************************** USER ***************************************-->

            <!--*************************************** Hotels ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">02</span>
                    <span class="flaticon-001-time-is-money feature__icon">{{$hotels->count()}}</span>
                    <h3 class="feature__title">
                        <a href="{{route('admin.hotels',app()->getLocale())}}">Hotels</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->

            <!--*************************************** Hotels ***************************************-->

            <!--*************************************** Rooms ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">03</span>
                    <span class="flaticon-009-search feature__icon">{{$rooms->count()}}</span>
                    <h3 class="feature__title">
                        <a href="{{route('admin.rooms',app()->getLocale())}}">Rooms</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->

            <!--*************************************** Rooms ***************************************-->

             <!--*************************************** Beds ***************************************-->
             <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">04</span>
                    <span class="flaticon-009-search feature__icon">{{$beds->count()}}</span>
                    <h3 class="feature__title">
                        <a href="{{route('admin.beds',app()->getLocale())}}">Beds</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->

            <!--*************************************** Beds ***************************************-->

            <!--*************************************** Applications ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">05</span>
                    <span class="flaticon-012-safebox feature__icon"></span>
                    <h3 class="feature__title">
                        <a href="service-detail.html">Applications</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->
            <!--*************************************** Applications ***************************************-->

            <!--*************************************** Reviews ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">06</span>
                    <span class="flaticon-017-monitor feature__icon"></span>
                    <h3 class="feature__title">
                        <a href="service-detail.html">Reviews</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->
            <!--*************************************** Reviews ***************************************-->

            <!--*************************************** Comments ***************************************-->
            <div class="col-md-4 col-sm-6">
                <div class="feature-item">
                    <span class="feature__number">07</span>
                    <span class="flaticon-017-monitor feature__icon"></span>
                    <h3 class="feature__title">
                        <a href="service-detail.html">Comments</a>
                    </h3>
                    <p class="feature__desc">
                        <h4>Features</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Add</p>
                            </div>
                            <div class="col-md-6">
                                <p> Edit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Delete</p>
                            </div>
                            <div class="col-md-6">
                                <p>Restore</p>
                            </div>
                        </div>
                    </p>
                </div><!-- end feature-item -->
            </div><!-- end col-md-4 -->

            <!--*************************************** Comments ***************************************-->
        </div><!-- end row -->
    </div>
</section>

@endsection