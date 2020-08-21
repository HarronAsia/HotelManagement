@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Search Results</h1>
    <p>There are {{$rooms->count()}} results found: </p>
    <section class="search-sec">
        <form method="GET" action="{{route('room.search')}}">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-12 p-0">

                                <select class="form-control search-slt" id="exampleFormControlSelect1" name="type_query">
                                    <option value="" name="type_query" selected hidden>Room Type</option>
                                    <option value="Single" name="type_query">Single</option>
                                    <option value="Couple" name="type_query">Couple</option>
                                    <option value="Four People" name="type_query">Four People</option>
                                    <option value="Family" name="type_query">Family</option>
                                    <option value="Business" name="type_query">Business</option>
                                    <option value="For Disabled" name="type_query">For Disabled</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" id="exampleFormControlSelect1" name="bed_query">
                                    <option value="" name="bed_query" selected hidden>Bed Type</option>
                                    <option value="Single Bed" name="bed_query">Single Bed</option>
                                    <option value="Double Bed" name="bed_query">Double Bed</option>
                                    <option value="Queen Size Bed" name="bed_query">Queen Size Bed</option>
                                    <option value="King size Bed" name="bed_query">King size Bed</option>
                                    <option value="Super Kind Size Bed" name="bed_query">Super Kind Size Bed</option>
                                    <option value="California king bed" name="bed_query">California king bed</option>
                                    <option value="Extra bed" name="bed_query">Extra bed</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <div class="form_group ">
                                    <input onfocus="(this.type='date')" class="form-control search-slt" name="start_date_query" placeholder="Checkin">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <div class="form_group ">
                                    <input onfocus="(this.type='date')" class="form-control search-slt" name="end_date_query" placeholder="Checkout">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <div class="form_group ">
                                    <input onfocus="(this.type='time')" class="form-control search-slt" name="start_time_query" placeholder="Time Start">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <div class="form_group ">
                                    <input onfocus="(this.type='time')" class="form-control search-slt" name="end_time_query" placeholder="Time End">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-3 col-sm-12 p-1">
                                <button type="submit" class="btn btn-success wrn-btn">Search</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <hr>
    
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Bed Type</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td><a href="{{route('room.show',$room->room_id)}}">{{$room->room_name}}</a></td>
                        <td>
                            @if($room->room_image == NULL)
                            <img src="{{asset('storage/default.png')}}" alt="img1" class="card-img-top" alt="Card image cap" style="width:200px;height:200px;">
                            @else

                            <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" class="card-img-top" style="width:200px;height:200px;">
                            @endif
                        </td>
                        <td>{{$room->room_type}}</td>
                        <td>{{$room->bed->bed_type??''}}</td>
                        <td>{{$room->room_condition}}</td>
                        <td>
                            <a href="{{route('hotel.index',$room->hotel->id)}}}">
                                {{$room->hotel->hotel_name}}
                            </a>
                        </td>
                        <td>{{\Illuminate\Support\Str::limit($room->room_description,260)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    
</div>
@endsection