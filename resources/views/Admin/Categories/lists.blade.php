@extends('layouts.admin.app')

@section('content')
<div class="container-fluid" style="max-width:100%">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h4>List of Categories</h4>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('admin.categories.add')}}">
                                <button type="button" class="btn btn-sm btn-primary">Add Category</button>
                            </a>
                            <a href="{{route('admin.export.categories')}}">
                                <button type="button" class="btn btn-sm btn-primary">Export Categories</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('admin.categories')}}">
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
                                    @foreach($categories as $category)
                                    <tr>
                                        <td><a href="{{route('category.index',$category->title)}}">{{$category->title}}</td>
                                        <td>
                                            @if($category->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:250px;">
                                            @else
                                            <img src="{{asset('storage/category/'.$category->title.'/'.$category->banner.'/')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:250px;">
                                            @endif
                                        </td>
                                        <td><small>{{$category->created_at}}</small></td>
                                        <td><small>{{$category->updated_at}}</small></td>
                                        <td><small>{{$category->deleted_at}}</small></td>
                                        <td style="font-size: 25px;">
                                            @if($category->deleted_at == NULL)
                                            <a href="{{route('admin.categories.edit',$category->title)}}" title="Edit"><i class="fa fa-edit"></i></a> &ensp;
                                            <a href="{{route('admin.categories.destroy',$category->title)}}" title="Remove"><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="{{route('admin.categories.restore',$category->title)}}" title="Restore"><i class="fa fa-trash-alt"></i></a>
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
            {{$categories->links()}}
        </div>
    </div>
</div>
@endsection