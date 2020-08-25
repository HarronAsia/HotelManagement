@extends('layouts.app')

@section('title',$bed)

@section('content')
<script src="https://www.cssscript.com/demo/animated-customizable-range-slider-pure-javascript-rslider-js/js/rSlider.min.js"></script>
<link href="{{ asset('css/Category.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/Category.js') }}"></script>
<section class="listings">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Search</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <form method="GET" action="{{route('category.search',$bed)}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter the name" id="name_query" name="name_query">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="floor_query" name="floor_query">
                                                    <option name="floor_query" value="" hidden>Floor</option>
                                                    <option name="floor_query" value="1">1</option>
                                                    <option name="floor_query" value="2">2</option>
                                                    <option name="floor_query" value="3">3</option>
                                                    <option name="floor_query" value="4">4</option>
                                                    <option name="floor_query" value="5">5</option>
                                                    <option name="floor_query" value="6">6</option>
                                                    <option name="floor_query" value="7">7</option>
                                                    <option name="floor_query" value="8">8</option>
                                                    <option name="floor_query" value="9">9</option>
                                                    <option name="floor_query" value="10">10</option>
                                                    <option name="floor_query" value="11">11</option>
                                                </select>
                                            </div>

                                            <div class="form-group ">
                                                <div class="form-group search-slt" id="type_query" name="type_query">
                                                    <label for="room_type">Room Type:</label>
                                                    <select class="form-control " name="type_query" id="type_query">
                                                        <option value="" name="type_query" selected>Type</option>
                                                        <option value="Single" name="type_query">Single</option>
                                                        <option value="Couple" name="type_query">Couple</option>
                                                        <option value="Three or Four People" name="type_query">Three or Four People</option>
                                                        <option value="Family" name="type_query">Family</option>
                                                        <option value="Business" name="type_query">Business</option>
                                                        <option value="For Disabled" name="type_query">For Disabled</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group search-slt">
                                                <label for="price">
                                                    <h4>Price</h4>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="number" min=100000 max="1000000" id="min_price" class="form-control" name="min_price" />
                                                        </div>
                                                        <div class="col">
                                                            <input type="number" min=100000 max="1000000" id="max_price" class="form-control" name="max_price" />
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>


                                            <hr>
                                            <button type="submit" class="btn btn-primary">Find Now</button>
                                            <button type="reset" class="btn btn-primary">Reset All</button>
                                            <div class="pb-3"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @foreach($rooms as $room)
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if($room->room_image == NULL)
                                        <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Room Image" style="width: 200px;height:200px;">
                                        @else
                                        <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" style="width: 200px;height:200px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6  card-body">
                                        <div class="list-title">
                                            <ul class="list-inline list-unstyled">
                                                <li class="list-inline-item"><a href="{{route('room.show',$room->id)}}">
                                                        <h4>{{$room->room_name}}</h4>
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="list-descrip">
                                            <small>{{$room->room_description}}</small>
                                        </div>



                                    </div>
                                    <div class="col-md-3 border-left card-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Very Good</h3>
                                            </li>
                                            <li class="text-secondary"><small>8067 Reviews </small></li>
                                        </ul>
                                        <a href="{{route('room.show',$room->id)}}">
                                            <button type="button" class="btn btn-outline-primary">Book Now</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row mb-3">
                    <div class="col-md-12">
                        <small> {{$rooms->count()}} properties found in Reno. </small>
                    </div>
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection