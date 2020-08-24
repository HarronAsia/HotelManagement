@extends('layouts.admin.app')

@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Edit Hotel </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.hotels.update',$hotel->id)}}" method="POST" enctype="multipart/form-data">
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
                <!-- Avatar -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Hotel Image </legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('hotel_image') ? ' has-error' : '' }}">
                                <label class="hotel_image">
                                    <input type="file" name="hotel_image" id="hotelimage" class="form-control " >
                                    
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @if($hotel->hotel_image == NULL)
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" class="form-control" alt="preview Hotel Image">
                                @else
                                <img id="image_preview_container" src="{{asset('storage/hotel/'.$hotel->hotel_name.'/'.$hotel->hotel_image.'/')}}" class="form-control" alt="preview Hotel Image">
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Avatar  -->

                <!-- User Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Hotel Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="hotel_name">Name</label>
                                <input type="text" class="form-control " id="hotel_name" placeholder="Enter Name of the Hotel" name="hotel_name" value="{{$hotel->hotel_name}}" required>
                            </div>
                        </div>
                    </div>12
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-md-">
                                <div class="form-group has-feedback{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <label for="user_id">Owner</label>
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
                        </div>
                    </div>
                </fieldset>
                <!-- User Information -->

                <!-- Personal Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Hotel Description</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback{{ $errors->has('hotel_description') ? ' has-error' : '' }}">
                                <label for="hotel_description">About the Hotel:</label>
                                <textarea name="hotel_description" id="hotel_description" class="form-control" cols="140" rows="20" required>{{$hotel->hotel_description}}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Personal Information -->

                <!-- Social Network -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Hotel Address</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback{{ $errors->has('hotel_address') ? ' has-error' : '' }}">
                                <label for="hotel_address">Address:</label>
                                <input type="text" name="hotel_address" class="form-control" placeholder="Enter Address" value="{{$hotel->hotel_address}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112061.09262729759!2d77.208022!3d28.632485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x644e33bc3def0667!2sIndior+Tours+Pvt+Ltd.!5e0!3m2!1sen!2sus!4v1527779731123" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </fieldset>
                <!-- Social Network -->

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection