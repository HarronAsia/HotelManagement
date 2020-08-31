@extends('layouts.admin.app')

@section('title','Notifications List')

@section('language')
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en'])}}">
        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; {{__('English')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp'])}}">
        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; {{__('Japan')}}
    </a>
    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi'])}}">
        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; {{__('VietNam')}}
    </a>
</div>
@endsection

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Notifications</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.notifications.read.all',app()->getLocale())}}">
                                <button type="button" class="btn btn-sm btn-info">Read All</button>
                            </a>
                            <a href="{{route('admin.notifications.delete.all',app()->getLocale())}}">
                                <button type="button" class="btn btn-sm btn-danger">Delete All</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.notifications',app()->getLocale())}}">
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
                                        <th>Room ID</th>
                                        <th>Detail</th>
                                        <th>User ID</th>
                                        <th>Read At</th>
                                        <th>Created On</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allnotifications as $singlenotification)
                                    <tr>
                                        <td><small>
                                                <a href="{{route('room.show',['locale'=>app()->getLocale(),'id'=>$singlenotification->notifiable_id])}}">
                                                    {{$singlenotification->notifiable_id}}
                                                </a>
                                            </small></td>
                                        <td><small>{{json_decode($singlenotification->data)->data}}</small></td>
                                        <td><small>{{$singlenotification->user_id}}</small></td>
                                        <td><small>{{$singlenotification->read_at}}</small></td>
                                        <td><small>{{$singlenotification->created_at}}</small></td>
                                        <td><small>{{$singlenotification->updated_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            <a href="{{route('admin.notifications.read',['locale'=>app()->getLocale(),'id'=>$singlenotification->id])}}" title="Read "><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.notifications.delete',['locale'=>app()->getLocale(),'id'=>$singlenotification->id])}}" title="Delete "><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{$allnotifications->links()}}
        </div>
    </div>
</div>
@endsection