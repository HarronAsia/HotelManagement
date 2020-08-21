@extends('layouts.admin.app')

@section('content')
<link href="{{ asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Popular Rooms</h5>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Condition</th>
                                <th scope="col">In Hotel</th>
                                <th scope="col">Times</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms->take(10) as $room)
                            <tr>
                                <th scope="row">{{$room->id}}</th>
                                <td>{{$room->room_name}}</td>
                                <td>{{$room->room_condition}}</td>
                                <td>{{$room->hotel->hotel_name}}</td>
                                <td>{{$room->booking_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Main Customers</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Has Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->take(6) as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->gender}}</td>
                                <td>{{$user->profile->job}}</td>
                                <td>{{$user->profile->balance}}</td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/admin/dashboard.js')}}"></script>
@endsection