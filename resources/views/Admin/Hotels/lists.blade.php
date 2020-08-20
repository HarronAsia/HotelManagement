@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Hotels</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.hotels.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Hotel</button>
                            </a>
                            <a href="{{route('admin.export.hotels')}}">
                                <button type="button" class="btn btn-sm btn-primary">Export Hotels</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.hotels')}}">
                            <input class="form-control mr-sm-2" type="search" name="query" id="search_text" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-dark table-striped">
                                <thead class="bg-light text-dark ">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Address</th>
                                        <th>Owner</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Last Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hotels as $hotel)
                                    <tr>
                                        <td><a href="{{route('hotel.index',$hotel->id)}}"><small>{{$hotel->hotel_name}}</small></td>
                                        <td><small>{{\Illuminate\Support\Str::limit($hotel->hotel_description,30)}}</small></td>
                                        <td><small>{{$hotel->category->title}}</small></td>
                                        <td><small>{{\Illuminate\Support\Str::limit($hotel->hotel_address,30)}}</small></td>
                                        <td><small>{{$hotel->user->name}}</small></td>
                                        <td><small>{{$hotel->created_at}}</small></td>
                                        <td><small>{{$hotel->updated_at}}</small></td>
                                        <td><small>{{$hotel->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">

                                            @if($hotel->deleted_at == NULL)
                                            <a href="{{route('admin.hotels.edit',$hotel->id)}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.hotels.destroy',$hotel->id)}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.hotels.restore',$hotel->id)}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{$hotels->links()}}
        </div>
    </div>
</div>
@endsection