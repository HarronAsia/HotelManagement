@extends('layouts.admin.app')

@section('title','Dashboard')

@section('content')
<link href="{{ asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <div class="row ">
        <div class="col-lg-12">
            <a href="{{route('admin.dashboard','Week')}}" class="btn btn-info">Week</a>
            <a href="{{route('admin.dashboard','Month')}}" class="btn btn-info">Month</a>
            <a href="{{route('admin.dashboard','Year')}}" class="btn btn-info">Year</a>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Popular Rooms</h5>
                </div>
                <div class="card-body">

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Times</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <th scope="row">{{$room->id}}</th>
                                <td>{{$room->name}}</td>
                                <td>{{$room->conditions}}</td>
                                <td>{{$room->booking}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Main Customers</h5>
                </div>
                <div class="card-body">

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
                            @foreach($users as $user)
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Busy Months</h5>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Times of Booking</th>
                            <th scope="col">In Month</th>
                            <th scope="col">In Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($busymonths as $busymonth)
                        <tr>
                            <th scope="row">{{$busymonth->id}}</th>
                            <td>{{$busymonth->name}}</td>
                            <td>{{$busymonth->booking}}</td>
                            <td>{{$busymonth->month}}</td>
                            <td>{{$busymonth->year}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('js/admin/dashboard.js')}}"></script>
@endsection