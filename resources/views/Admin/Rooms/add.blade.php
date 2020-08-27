@extends('layouts.admin.app')

@section('title','Add Room')
@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Add New Room </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.rooms.store',app()->getLocale())}}" method="POST" enctype="multipart/form-data">
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
                <!-- Image -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Room Image </legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('room_image') ? ' has-error' : '' }}">
                                <label class="room_image">
                                    <input type="file" name="room_image" id="roomimage" class="form-control ">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" class="form-control" alt="preview Room Image">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Image  -->

                <!-- Room Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Room Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('room_name') ? ' has-error' : '' }}">
                                <label for="room_name">Name</label>
                                <input type="text" class="form-control " id="room_name" placeholder="Enter Name of the Room" name="room_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <label for="user_id">Customer Name</label>
                                    <select class="form-control " name="user_id" id="user_id" required>
                                        @foreach($users as $user)
                                        @if(Auth::user()->id == $user->id)
                                        <option value="{{$user->id}}" style="color: blue;" selected>{{$user->name}}</option>
                                        @else
                                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('hotel_id') ? ' has-error' : '' }}">
                                    <label for="hotel_id">In Hotel</label>
                                    <select class="form-control " name="hotel_id" id="hotel_id" required>
                                        @foreach($hotels as $hotel)
                                        <option value="{{$hotel->id}}" selected>{{$hotel->hotel_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Room Information -->

                <!-- Room Description -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Room Description</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback{{ $errors->has('room_description') ? ' has-error' : '' }}">
                                <label for="room_description">About the Room:</label>
                                <textarea name="room_description" id="room_description" class="form-control" cols="140" rows="20" required></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Room Description -->

                <!-- Room Other Informtaion  -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Room Other Information</legend>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group has-feedback{{ $errors->has('room_floor') ? ' has-error' : '' }}">
                                <label for="room_floor">On Floor:</label>
                                <select class="form-control " name="room_floor" id="room_floor" required>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group has-feedback{{ $errors->has('room_number') ? ' has-error' : '' }}">
                                <label for="room_number">Room Number:</label>
                                <input type="text" name="room_number" class="form-control" placeholder="Enter Address" required>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group has-feedback{{ $errors->has('room_type') ? ' has-error' : '' }}">
                                <label for="room_type">Room Type:</label>
                                <select class="form-control " name="room_type" id="room_type" required>
                                    <option value="Single" selected>Single</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Three or Four People">Three or Four People</option>
                                    <option value="Family">Family</option>
                                    <option value="Business">Business</option>
                                    <option value="For Disabled">For Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback{{ $errors->has('room_price') ? ' has-error' : '' }}">
                                <label for="room_price">Room Price:</label>
                                <input type="text" name="room_price" class="form-control" placeholder="Enter Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('room_status') ? ' has-error' : '' }}">
                                <label for="room_status">Room Status:</label>
                                <select class="form-control " name="room_status" id="room_status" required>
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Blocked">Blocked</option>
                                    <option value="Verified">Verified</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('room_condition') ? ' has-error' : '' }}">
                                <label for="room_condition">Room Condition:</label>
                                <select class="form-control " name="room_condition" id="room_condition" required>
                                    <option value="Available" selected>Available</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Complimentary">Complimentary</option>
                                    <option value="Stay Over">Stay Over</option>
                                    <option value="On-change">On-change</option>
                                    <option value="Do Not Disturb">Do Not Disturb</option>
                                    <option value="Sleep-out">Sleep-out</option>
                                    <option value="Skipper">Skipper</option>
                                    <option value="Sleeper">Sleeper</option>
                                    <option value="Vacant and ready">Vacant and ready</option>
                                    <option value="Out-of-order">Out-of-order</option>
                                    <option value="Double Lock">Double Lock</option>
                                    <option value="Lockout">Lockout</option>
                                    <option value="Due out">Due out</option>
                                    <option value="Do Not Paid">Do Not Paid</option>
                                    <option value="Checkout">Checkout</option>
                                    <option value="Late Check-out">Late Check-out</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('date_start') ? ' has-error' : '' }}">
                                <label for="date_start">Room Date Start:</label>
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('date_end') ? ' has-error' : '' }}">
                                <label for="date_end">Room Date End:</label>
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('time_start') ? ' has-error' : '' }}">
                                <label for="time_start">Room Time Start:</label>
                                <input type="time" class="form-control" name="time_start">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group has-feedback{{ $errors->has('time_end') ? ' has-error' : '' }}">
                                <label for="time_end">Room Time End:</label>
                                <input type="time" class="form-control" name="time_end">
                            </div>
                        </div>
                    </div>

                </fieldset>
                <!-- Room Other Informtaion  -->

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection