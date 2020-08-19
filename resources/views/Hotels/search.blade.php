@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Search Results</h1>
    <p>There are {{$hotels->count()}} results found: </p>
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Address</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <th scope="row">{{$hotel->id}}</th>
                    <td><a href="{{route('hotel.index',$hotel->id)}}">{{$hotel->hotel_name}}</a></td>
                    <td>{{$hotel->category->title}}</td>
                    <td>{{$hotel->user->name}}</td>
                    <td>{{$hotel->hotel_address}}</td>
                    <td>{{$hotel->hotel_description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection