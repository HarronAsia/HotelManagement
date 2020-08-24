@extends('layouts.admin.app')

@section('title','Dashboard')

@section('content')
<link href="{{ asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-car" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3">
                    <h4>Users</h4>
                </div>
                <div class="text-info text-center mt-2">
                    <h1></h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3">
                    <h4>Eyes</h4>
                </div>
                <div class="text-success text-center mt-2">
                    <h1>9332</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-heart" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3">
                    <h4>Hearts</h4>
                </div>
                <div class="text-danger text-center mt-2">
                    <h1>346</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card"><span class="fa fa-inbox" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3">
                    <h4>Inbox</h4>
                </div>
                <div class="text-warning text-center mt-2">
                    <h1>346</h1>
                </div>
            </div>
        </div>
    </div>

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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Has Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->take(8) as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->gender}}</td>
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