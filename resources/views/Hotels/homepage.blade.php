@extends('layouts.app')

@section('content')
<link href="{{ asset('css/hotel.css')}}" rel="stylesheet" type="text/css">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h2 class="heading">Hotel {{$hotel->hotel_name}}</h2>
        </div>
    </div>
    <div class="row">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('hotel.index',$hotel->id)}}">
            <input class="form-control mr-sm-2" type="search" name="query" id="search_text" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
        </form>
    </div>
    <div class="row">
        @foreach($rooms as $room)
        <div class="col-md-4">
            <figure class="text-center">
                @if($room->room_image == NULL)
                <img src="{{asset('storage/default.png')}}" alt="img1" style="width: 400px; height:250px;">
                @else
                <img src="{{asset('storage/hotel/'.$hotel->hotel_name.'/'.$room->room_image.'/')}}" alt="img1" style="width: 400px; height:250px;">
                @endif
                <figcaption>
                    <a href="{{route('room.show',$room->id)}}">
                        <h5>{{$room->room_name}}</h5>
                    </a>
                    <h3>{{$room->room_price}}</h3>
                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>
</div>
<div>
    {{$rooms->links()}}
</div>
@endsection