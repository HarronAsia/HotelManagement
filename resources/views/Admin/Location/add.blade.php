@extends('layouts.admin.app')

@section('title','Add new Location')

@section('content')

<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Add New Location </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.location.store')}}" method="POST" enctype="multipart/form-data">
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

                <!-- Bed Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Location Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('tinh_name') ? ' has-error' : '' }}">
                                <label for="tinh_name">Name</label>
                                <input type="text" class="form-control " id="tinh_name" placeholder="Enter Name of the Bed" name="tinh_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('room_id') ? ' has-error' : '' }}">
                                    <label for="room_id">In Room</label>
                                    <select class="form-control " name="room_id" id="room_id" required>
                                        @foreach($rooms as $room)
                                        <option value="{{$room->id}}" selected>{{$room->room_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('bed_type') ? ' has-error' : '' }}">
                                    <label for="bed_type">Bed Type</label>
                                    <select class="form-control " name="bed_type" id="bed_type" required>
                                        <option value="Single Bed">Single Bed</option>
                                        <option value="Double Bed">Double Bed</option>
                                        <option value="Queen Size Bed">Queen Size Bed</option>
                                        <option value="King size Bed">ing size Bed</option>
                                        <option value="Super Kind Size Bed">Super Kind Size Bed</option>
                                        <option value="California king bed">California king bed</option>
                                        <option value="Extra bed">Extra bed</option>
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