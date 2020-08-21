@extends('layouts.app')
@section('content')
<link href="{{ asset('css/reserve.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="container-fluid register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Booking a place for {{$room->room_name}}</p>
        </div>
        <form action="{{route('room.booking',$room->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-content bk">
                <input type="hidden" name="bookable_id" value="{{$room->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <!-- Personal Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Personal Information</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name</label>
                            <p class="form-control">{{Auth::user()->name}}</p>
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-lg-4">
                                <label for="email">Email ID</label>
                                <p class="form-control">{{Auth::user()->email}}</p>
                            </div>
                            <div class="col-lg-4">
                                <label for="dob">Date of Birth</label>
                                <p class="form-control">{{Auth::user()->profile->dob}}</p>
                            </div>
                            <div class="col-lg-4">
                                <label for="number">Phone Number</label>
                                <p class="form-control">{{Auth::user()->profile->number}}</p>
                            </div>

                        </div>
                        <div class="row top-buffer">
                            <div class="form-group col-lg-6">
                                <label for="inputAddress">Address</label>
                                <p class="form-control">{{Auth::user()->profile->place}}</p>
                            </div>

                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="inputState">Gender</label>
                                <p class="form-control">{{Auth::user()->profile->gender}}</p>
                            </div>
                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('blood') ? ' has-error' : '' }}">
                                <label for="inputState">Blood Type</label>
                                <p class="form-control">{{Auth::user()->profile->blood}}</p>
                            </div>
                            <div class="form-group col-lg-2 has-feedback{{ $errors->has('relationship') ? ' has-error' : '' }}">
                                <label for="inputState">Relationship</label>
                                <p class="form-control">{{Auth::user()->profile->relationship}}</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Personal Information -->


                <!-- Room Information -->

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Room Information</legend>
                    <div class="row top-buffer">
                        <div class="col-lg-12">
                            <label for="cname">Room Image</label>
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
                            <label for="percentage">Room Name</label>
                            <p class="form-control">{{$room->room_name}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">Room Number</label>
                            <p class="form-control">{{$room->room_number}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">Room Type</label>
                            <p class="form-control">{{$room->room_type}}</p>
                        </div>
                        <div class="col-lg-3">
                            <label for="percentage">In Hotel</label>
                            <p class="form-control">{{$room->hotel->hotel_name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <label for="percentage">Description</label>
                            <p class="form-control">{{$room->room_description}}</p>
                        </div>
                    </div>
                </fieldset>
                <!-- Room Information -->

                <!-- Booking Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Booking Date</legend>
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
                                <input onfocus="(this.type='date')" class="form-control" name="checkin" placeholder="Checkin">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('checkout') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='date')" class="form-control" name="checkout" placeholder="Checkout">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('time_begin') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='time')" class="form-control" name="time_begin" placeholder="Time Start">
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form_group has-feedback{{ $errors->has('time_end') ? ' has-error' : '' }}">
                                <input onfocus="(this.type='time')" class="form-control " name="time_end" placeholder="Time End">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Booking Information -->

                <!-- Price  -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Price</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="location">Have you taken any Test Prep?</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Options</th>
                                        <th scope="col">Nightly Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <p>Free Cancellation</p>
                                            <p>Reserve now, pay when you stay</p>
                                            <p>Free Parking</p>
                                            <p>Free Internet</p>
                                            <p>No Expedia booking or credit card fees</p>
                                            <p>Free Cancellation</p>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline" style="font-size: 25px;">
                                                <input class="form-check-input" name="balance" type="checkbox" id="inlineCheckbox1" value="695235.00">
                                                <label class="form-check-label" for="inlineCheckbox1">$30</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <p>Free Cancellation</p>
                                            <p>Breakfast Included</p>
                                            <p>Reserve now, pay when you stay</p>
                                            <p>Free Parking</p>
                                            <p>Free Internet</p>
                                            <p>No Expedia booking or credit card fees</p>
                                            <p>Free Cancellation</p>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline" style="font-size: 25px;">
                                                <input class="form-check-input" name="balance" type="checkbox" id="inlineCheckbox1" value="880631.00">
                                                <label class="form-check-label" for="inlineCheckbox1">$38</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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