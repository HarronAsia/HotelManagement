@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Rooms</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.rooms.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Room</button>
                            </a>
                            <a href="{{route('admin.export.rooms')}}">
                                <button type="button" class="btn btn-sm btn-primary">Export Rooms</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.rooms')}}">
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
                                        <th>Customer</th>
                                        <th>In Hotel</th>
                                        <th>Condition</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Last Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                    <tr>
                                        <td><a href="{{route('room.show',$room->id)}}"><small>{{$room->room_name}}</small></td>
                                        <td><small>{{$room->user->name}}</small></td>
                                        <td><small>{{$room->hotel->hotel_name}}</small></td>
                                        <td><small>{{$room->room_condition}}</small></td>
                                        <td><small>{{$room->room_status}}</small></td>
                                        <td><small>{{$room->created_at}}</small></td>
                                        <td><small>{{$room->updated_at}}</small></td>
                                        <td><small>{{$room->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if($room->deleted_at == NULL)
                                            <a href="{{route('admin.rooms.edit',$room->id)}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.rooms.destroy',$room->id)}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.rooms.restore',$room->id)}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
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
            {{$rooms->links()}}
        </div>
    </div>
</div>
@endsection