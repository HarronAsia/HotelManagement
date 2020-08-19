@extends('layouts.admin.app')

@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Edit Region information </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.regions.update',$region->title)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Banner -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Banner </legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('banner') ? ' has-error' : '' }}">
                                <label class="banner">
                                    <input type="file" name="banner" id="region_banner" class="form-control ">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @if($region->image == NULL)
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" class="form-control" alt="preview Banner " style="width:450px;height:450xpx;">
                                @else
                                <img src="{{asset('storage/category/'.$category->title.'/'.$category->banner.'/')}}" class="img" alt="preview Avatar Image" style="width: 450px;height:450xpx;">
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Banner  -->

                <!-- Category Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Region Information</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Region</label>
                                <input type="text" class="form-control " id="title" placeholder="Enter Region" name="title" value="{{$region->title}}" required>
                            </div>
                        </div>
                    </div>
                    <!-- Category Information -->
                </fieldset>

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection