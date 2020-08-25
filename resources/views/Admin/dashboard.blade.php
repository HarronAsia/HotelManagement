@extends('layouts.admin.app')

@section('title','Dashboard')

@section('content')
<link href="{{ asset('css/admin/dashboard.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <div class="row ">
        
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
                                <th scope="col">Times</th>
                                @if($date == 'Month')
                                <th scope="col" id="day">In Month</th>
                                @elseif ($date == 'Year')
                                <th scope="col" id="day">In Year</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <th scope="row">{{$room->id}}</th>
                                <td>{{$room->name}}</td>
                                <td>{{$room->conditions}}</td>
                                <td>{{$room->booking}}</td>
                                <td>{{$room->date}}</td>
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