@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Users</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.users.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add User</button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.users')}}">
                        <input class="form-control mr-sm-2" type="search" name="query" id="search_text" placeholder="{{__('Search')}}" aria-label="{{__('Search')}}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}}</button>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-dark table-striped">
                                <thead class="bg-light text-dark ">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Last Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{route('profile.view',$user->name)}}"><small>{{$user->name}}</small></td>
                                        <td><small>{{$user->email}}</small></td>
                                        <td><small>{{$user->role}}</small></td>
                                        <td><small>{{$user->created_at}}</small></td>
                                        <td><small>{{$user->updated_at}}</small></td>
                                        <td><small>{{$user->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if(Auth::user()->id == $user->id)
                                            <a href="{{route('admin.users.edit',['user'=>$user->name,'profile'=>$user->profile->id??''])}}" title="Edit"><i class="fa fa-edit"></i></a>
                                            @else
                                            @if($user->deleted_at == NULL)
                                            <a href="{{route('admin.users.edit',['user'=>$user->name,'profile'=>$user->profile->id??''])}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.users.destroy',['user'=>$user->id])}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.users.restore',['user'=>$user->id])}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
                                            @endif
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
            {{$users->links()}}
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/User/main.js') }}"></script>
@endsection