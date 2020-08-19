@extends('layouts.admin.app')

@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Edit Information on Bed {{$bed->bed_name}} </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.beds.update',$bed->id)}}" method="POST" enctype="multipart/form-data">
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
                    <legend class="scheduler-border">Bed Image </legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('bed_image') ? ' has-error' : '' }}">
                                <label class="bed_image">
                                    <input type="file" name="bed_image" id="bedimage" class="form-control ">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @if($bed->bed_image == NULL)
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" class="form-control" alt="preview Room Image">
                                @else
                                <img src="{{asset('storage/hotel/'.$bed->room->hotel->hotel_name.'/'.$bed->room->room_name.'/'.$bed->bed_name.'/'.$bed->bed_image)}}" alt="Card image cap" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Image  -->

                <!-- Bed Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Bed Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('bed_name') ? ' has-error' : '' }}">
                                <label for="bed_name">Name</label>
                                <input type="text" class="form-control " id="bed_name" placeholder="Enter Name of the Bed" name="bed_name" value="{{$bed->bed_name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('room_id') ? ' has-error' : '' }}">
                                    <label for="room_id">In Hotel</label>
                                    <select class="form-control " name="room_id" id="room_id" required>
                                        @foreach($rooms as $room)
                                        <option value="{{$bed->room_id}}" selected>{{$bed->room->room_name}}</option>
                                        <option value="{{$room->id}}">{{$room->room_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('bed_type') ? ' has-error' : '' }}">
                                    <label for="bed_type">Customer Name</label>
                                    <select class="form-control " name="bed_type" id="bed_type" required>
                                        <option value="{{$bed->bed_type}}" selected>{{$bed->bed_type}}</option>
                                        <option value="Single Bed"></option>
                                        <option value="Double Bed"></option>
                                        <option value="Queen Size Bed"></option>
                                        <option value="King size Bed"></option>
                                        <option value="Super Kind Size Bed"></option>
                                        <option value="California king bed"></option>
                                        <option value="Extra bed"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Bed Information -->

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection