@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Beds</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.beds.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Bed</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.beds')}}">
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
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>In Room</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Last Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($beds as $bed)
                                    <tr>
                                        <td><small>{{$bed->bed_name}}</small></td>
                                        <td><small>{{$bed->bed_type}}</small></td>
                                        <td><small>{{$bed->bed_image}}</small></td>
                                        <td><small>{{$bed->room->room_name}}</small></td>
                                        <td><small>{{$bed->created_at}}</small></td>
                                        <td><small>{{$bed->updated_at}}</small></td>
                                        <td><small>{{$bed->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if($bed->deleted_at == NULL)
                                            <a href="{{route('admin.beds.edit',$bed->id)}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.beds.destroy',$bed->id)}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.beds.restore',$bed->id)}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
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
            {{$beds->links()}}
        </div>      
    </div>
</div>
@endsection