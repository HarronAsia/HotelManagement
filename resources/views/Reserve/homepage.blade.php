@extends('layouts.app')

@section('title','Booking a Room')

@section('language')
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en','room'=>$room->id])}}">
        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp','room'=>$room->id])}}">
        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi','room'=>$room->id])}}">
        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
    </a>
</div>
@endsection

@section('content')

<link href="{{ asset('css/reserve.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="container-fluid register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>{{$room->room_name}}</p>
        </div>
        <form action="{{route('room.booking',['locale'=>app()->getLocale(),'room'=>$room->id])}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-content bk">
                <input type="hidden" name="bookable_id" value="{{$room->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <!-- Personal Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{__('Personal Information')}}</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">{{__('Name')}}</label>
                            <p class="form-control">{{Auth::user()->name}}</p>
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-lg-4">
                                <label for="email">{{__('Email ID')}}</label>
                                <p class="form-control">{{Auth::user()->email}}</p>
                            </div>
                            <div class="col-lg-4">
                                <label for="dob">{{__('Date of Birth')}}</label>
                                <p class="form-control">{{Auth::user()->profile->dob}}</p>
                            </div>
                            <div class="col-lg-4">
                                <label for="number">{{__('Phone Number')}}</label>
                                <p class="form-control">{{Auth::user()->profile->number}}</p>
                            </div>

                        </div>
                        <div class="row top-buffer">
                            <div class="form-group col-lg-6">
                                <label for="inputAddress">Address</label>
                                <p class="form-control">{{Auth::user()->profile->place}}</p>
                            </div>

                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="inputState">{{__('Gender')}}</label>
                                <p class="form-control">{{__(Auth::user()->profile->gender)}}</p>
                            </div>
                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('blood') ? ' has-error' : '' }}">
                                <label for="inputState">{{__('Blood Type')}}</label>
                                <p class="form-control">{{__(Auth::user()->profile->blood)}}</p>
                            </div>
                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('relationship') ? ' has-error' : '' }}">
                                <label for="inputState">{{__('Relationship')}}</label>
                                <p class="form-control">{{__(Auth::user()->profile->relationship)}}</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Personal Information -->


                <!-- Room Information -->

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{__('Room Information')}}</legend>
                    <div class="row top-buffer">
                        <div class="col-lg-12">
                            <label for="cname">{{__('Room Image')}}</label>
                            @if($room->room_image == NULL)
                            <img src="{{asset('storage/default.png')}}" alt="img1" class="card-img-top" alt="Card image cap">
                            @else

                            <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" class="card-img-top">
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row top-buffer">
                        <div class="col-lg-3">
                            <label for="percentage">{{__('Room Name')}}</label>
                            <p class="form-control">{{$room->room_name}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">{{__('Room Number')}}</label>
                            <p class="form-control">{{$room->room_number}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">{{__('Room Type')}}</label>
                            <p class="form-control">{{__($room->room_type)}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">{{__('In Hotel')}}</label>
                            <p class="form-control">{{$room->hotel->hotel_name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="percentage">{{__('Description')}}</label>
                            <p class="form-control">{{$room->room_description}}</p>
                        </div>
                    </div>
                </fieldset>
                <!-- Room Information -->

                <!-- Booking Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{__('Booking Date')}}</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            {!!$calendar->calendar()!!}

                            {!! $calendar->script() !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('checkin') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='date')" class="form-control" name="checkin" placeholder="{{__('Checkin')}}">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('checkout') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='date')" class="form-control" name="checkout" placeholder="{{__('Checkout')}}">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('time_begin') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='time')" class="form-control" name="time_begin" placeholder="{{__('Time Start')}}">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('time_end') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='time')" class="form-control " name="time_end" placeholder="{{__('Time End')}}">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Booking Information -->

                <!-- Price  -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{__('Price')}}</legend>
                    <div class="container-fluid bg-gradient p-5">
                        <div class="row m-auto text-center w-75">

                            <div class="col-4 princing-item red">
                                <div class="pricing-divider ">
                                    <h3 class="text-light">{{__('Bronze')}}</h3>
                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3">$</span> 4.32 <span class="h4" >{{__('/day')}}</span></h4>
                                    <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                        <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                    </svg>
                                </div>
                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>{{__('<b>Free</b> Wifi')}}</li>
                                        <li>{{__('<b>Free</b> Meal')}}</li>
                                        <li>{{__('<b>Free </b>Parking')}}</li>
                                        <li>{{__('<b>Free Help Center</b>')}}</li>
                                    </ul>
                                    <input class="form-check-input" type="radio" name="balance" id="balance" value="100000">
                                </div>
                            </div>

                            <div class="col-4 princing-item blue">
                                <div class="pricing-divider ">
                                    <h3 class="text-light">{{__('Silver')}}</h3>
                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3">$</span> 5.18 <span class="h5">{{__('/day')}}</span></h4>
                                    <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                        <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                    </svg>
                                </div>

                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>{{__('<b>Free</b> Wifi')}}</li>
                                        <li>{{__('<b>Free</b> Meal')}}</li>
                                        <li>{{__('<b>Free </b>Parking')}}</li>
                                        <li>{{__('<b>Free Help Center')}}</b></li>
                                        <li>{{__('<b>Free </b>Breakfast')}}</li>
                                        <li>{{__('<b>Free </b>Lunch')}}</li>
                                        <li>{{__('<b>Free </b>Dinner')}}</li>

                                    </ul>
                                    <input class="form-check-input" type="radio" name="balance" id="balance" value="200000">
                                </div>
                            </div>






                            <div class="col-4 princing-item green">
                                <div class="pricing-divider ">
                                    <h3 class="text-light">{{__('Gold')}}</h3>
                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3">$</span> 6.04 <span class="h5">{{__('/day')}}</span></h4>
                                    <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                        <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                        <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                    </svg>
                                </div>

                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>{{__('<b>Free</b> Wifi')}}</li>
                                        <li>{{__('<b>Free</b> Meal')}}</li>
                                        <li>{{__('<b>Free </b>Parking')}}</li>
                                        <li>{{__('<b>Free Help Center')}}</b></li>
                                        <li>{{__('<b>Free </b>Breakfast')}}</li>
                                        <li>{{__('<b>Free </b>Lunch')}}</li>
                                        <li>{{__('<b>Free </b>Dinner')}}</li>
                                        <li><b>{{__('Only 3$ first month, after that 5$ every month')}}</b></li>
                                    </ul>
                                    <input class="form-check-input" type="radio" name="balance" id="balance" value="300000">
                                </div>
                            </div>
                </fieldset>
            </div>
            <!-- Study Abroad Plans -->
            <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
            <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
            <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            @endif
        </form>
    </div>
</div>

@endsection