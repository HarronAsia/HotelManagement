@extends('layouts.app')

@section('title',$room->room_name)

@section('language')
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en','id'=>$room->id])}}">
        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp','id'=>$room->id])}}">
        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi','id'=>$room->id])}}">
        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
    </a>
</div>
@endsection

@section('content')
<link href="{{ asset('css/room.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>

<!--Latest JQuery Light Gallery -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/css/lightgallery.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/js/lightgallery.min.js"></script>
<!--Latest JQuery Light Gallery -->
<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-lg-8">

            @include('Room.Materials.header')
            <hr>

            {!!$calendar->calendar()!!}

            {!! $calendar->script() !!}
            <hr>
            @guest

            @else
            @include('Room.Materials.Comment.add')
            @endif

            @include('Room.Materials.Comment.result')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Categories Widget -->
            <div class="card my-3">
                <h5 class="card-header">{{__('Room Type')}}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p>{{__($room->room_type)}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">{{__('Room Information')}}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <p> <strong>{{__('Room on floor')}}:</strong> {{$room->room_floor}}</p>
                            <p> <strong>{{__('Room Number')}}:</strong> {{$room->room_number}}</p>
                            <p> <strong>{{__('Room Price')}}:</strong> {{$room->room_price}}</p>
                        </div>
                        <div class="col-lg-7">
                            <p> <strong>{{__('Room Condition')}}:</strong> {{__($room->room_condition)}}</p>
                            <p> <strong>{{__('Room Status')}}:</strong> {{__($room->room_status)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">{{__('Hotel Image')}}</h5>
                <div class="card-body">
                    @if($room->hotel->hotel_image == NULL)
                    <img src="{{asset('storage/default.png')}}" alt="Hotel Image" class="card-img-top">
                    @else
                    <img id="image_preview_container" src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->hotel->hotel_image.'/')}}" class="form-control" alt="preview Hotel Image" class="card-img-top">
                    @endif
                </div>
            </div>
            <!-- tweeter -->
            <div class="card my-4">
                <h5 class="card-header">{{__('Other Information')}}</h5>
                <div class="card-body">
                    @if(Auth::guest())
                    <a class="btn btn-success btn-block" href="{{route('login',app()->getLocale())}}">{{__('Reserve')}}</a>
                    @else
                    @if(Auth::user()->id == $room->user_id)

                    @else
                        @if($date->user_id??'' != Auth::user()->id)
                        <a class="btn btn-success btn-block" href="{{route('room.reserve',['locale'=>app()->getLocale(),'room'=>$room->id])}}">{{__('Reserve')}}</a>
                        @else
                        <a class="btn btn-danger btn-block" href="{{route('room.reserve.cancel',['locale'=>app()->getLocale(),'room'=>$room->id,'user'=>Auth::user()->name])}}">{{__('Cancel')}}</a>
                        @endif
                    @endif

                    @endif
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
    <hr>
</div>

<!-- /.container -->
<script src="{{ asset('js/room.js') }}"></script>

@endsection