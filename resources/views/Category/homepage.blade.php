@extends('layouts.app')

@section('content')
<link href="{{ asset('css/Category_Homepage.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid ">
    <div class="row">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('category.index',$category->title)}}">
            <div class="form-group">
                <input class="form-control mr-sm-2" type="search" name="query" id="search_text" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
            </div>
        </form>
    </div>
    <div class="row mt-30">

        @foreach($hotels as $hotel)
        <div class="col-sm-12 col-md-6">

            <div class="box20 blue">
                @if($hotel->hotel_image == NULL)
                <img src="{{asset('storage/default.png')}}" alt="Hotel Image" style="width:400px;height:400px;">
                @else
                <img id="image_preview_container" src="{{asset('storage/hotel/'.$hotel->hotel_name.'/'.$hotel->hotel_image.'/')}}" class="form-control" alt="preview Hotel Image" style="width:400px;height:400px;">
                @endif
                <div class="box-content">
                    <i class="fas fa-hotel circle-icon"></i>
                    <h3 class="title">{{$hotel->hotel_name}}</h3>
                    <h4 style="color:aqua;">Tags: {{$hotel->category->title}}</h4>
                    <p>{{$hotel->created_at}}</p>
                    <p> <small>{{$hotel->hotel_address}}</small></p>
                    <p> <small>{{\Illuminate\Support\Str::limit($hotel->hotel_description,45)}}</small></p>
                    <p>
                        <a class="btn btn-secondary" href="{{route('hotel.index',$hotel->id)}}">View</a>
                    </p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$hotels->links()}}
</div>

@endsection