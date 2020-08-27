@extends('layouts.admin.app')

@section('title','List of Beds')
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
                            <a href="{{route('admin.beds.add',app()->getLocale())}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Bed</button>
                            </a>
                            <a href="{{route('admin.export.beds',app()->getLocale())}}">
                                <button type="button" class="btn btn-sm btn-primary">Export Bed</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.beds',app()->getLocale())}}">
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
                                        <td>
                                            @if($bed->bed_image == NULL)
                                            <img id="image_preview_container" src="{{asset('storage/default.png')}}" class="form-control" alt="preview Room Image" style="width: 250px;height:250px;">
                                            @else
                                            <img src="{{asset('storage/hotel/'.$bed->room->hotel->hotel_name.'/'.$bed->room->room_name.'/'.$bed->bed_name.'/'.$bed->bed_image)}}" alt="Card image cap" class="form-control" style="width: 250px;height:250px;">
                                            @endif
                                        </td>
                                        <td><small>{{$bed->room->room_name}}</small></td>
                                        <td><small>{{$bed->created_at}}</small></td>
                                        <td><small>{{$bed->updated_at}}</small></td>
                                        <td><small>{{$bed->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if($bed->deleted_at == NULL)
                                            <a href="{{route('admin.beds.edit',['locale'=>app()->getLocale(),'bed'=>$bed->id])}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.beds.destroy',['locale'=>app()->getLocale(),'bed'=>$bed->id])}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.beds.restore',['locale'=>app()->getLocale(),'bed'=>$bed->id])}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
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