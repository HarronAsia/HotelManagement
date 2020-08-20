@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Regions</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.regions.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Region</button>
                            </a>
                            <a href="{{route('admin.export.regions')}}">
                                <button type="button" class="btn btn-sm btn-primary">Export Region</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.regions')}}">
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
                                        <th>Title</th>
                                        <th>Banner</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Last Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($regions as $region)
                                    <tr>
                                        <td><a href="{{route('region.index',$region->title)}}">{{$region->title}}</td>
                                        <td>
                                            @if($region->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:250px;">
                                            @else
                                            <img src="{{asset('storage/region/'.$region->title.'/'.$region->banner.'/')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:250px;">
                                            @endif
                                        </td>
                                        <td><small>{{$region->created_at}}</small></td>
                                        <td><small>{{$region->updated_at}}</small></td>
                                        <td><small>{{$region->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if($region->deleted_at == NULL)
                                            <a href="{{route('admin.regions.edit',$region->title)}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.regions.destroy',$region->title)}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.regions.restore',$region->title)}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
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
            {{$regions->links()}}
        </div>
    </div>
</div>
@endsection