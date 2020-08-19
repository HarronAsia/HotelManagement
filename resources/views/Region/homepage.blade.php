@extends('layouts.app')

@section('content')
<link href="{{ asset('css/Category_Homepage.css')}}" rel="stylesheet" type="text/css">
<div class="container-fluid ">

    <div class="row mt-30">

        @foreach($regions as $region)
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

                        @if(Auth::user()->role == 'Admin')
                        <a class="btn" href="{{route('hotel.index',$hotel->id)}}">View</a>
                        @if($hotel->deleted_at == NULL)
                        <a class="btn btn-info" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                        @else
                        <a class="btn btn-success" href="#">Restore</a>
                        @endif
                        @else
                        @if(Auth::user()->id == $hotel->user_id)
                        @if($hotel->deleted_at == NULL)
                        <a class="btn btn-info" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                        @else
                        <a class="btn btn-success" href="#">Restore</a>
                        @endif
                        @else
                        <p><a class="btn" href="#">View</a></p>
                        @endif
                        @endif

                    </p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$hotels->links()}}
</div>

@endsection