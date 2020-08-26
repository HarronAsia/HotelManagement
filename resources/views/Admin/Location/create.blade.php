@extends('layouts.admin.app')

@section('title','Add new Location')

@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Thêm Địa chỉ mới </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.searching.store')}}" method="POST" enctype="multipart/form-data">
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

                <!-- Bed Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Thông tin về Tĩnh</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('tinh_name') ? ' has-error' : '' }}">
                                <label for="tinh_name">Tên Tĩnh</label>
                                <input type="text" class="form-control " id="tinh_name" placeholder="Nhập tên Tĩnh" name="tinh_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('tinh_name') ? ' has-error' : '' }}">
                                <label for="tinh_description">Chú thích về Tĩnh</label>
                                <input type="text" class="form-control " id="tinh_description" placeholder="Thêm chú thích về tĩnh" name="tinh_description" required>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Thông tin về Quận hoặc Huyện</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('huyen_name') ? ' has-error' : '' }}">
                                <label for="huyen_name">Tên Quận hoặc Huyện</label>
                                <input type="text" class="form-control " id="huyen_name" placeholder="Nhập Tên Quận hoặc Huyện" name="huyen_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('huyen_description') ? ' has-error' : '' }}">
                                <label for="huyen_description">Chú thích về Quận hoặc Huyện</label>
                                <input type="text" class="form-control " id="huyen_description" placeholder="Thêm chú thích về Quận hoặc Huyện" name="huyen_description" required>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Thông tin về Xã</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('xa_name') ? ' has-error' : '' }}">
                                <label for="xa_name">Tên Xã</label>
                                <input type="text" class="form-control " id="xa_name" placeholder="Nhập Tên Xã" name="xa_name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('xa_description') ? ' has-error' : '' }}">
                                <label for="xa_description">Chú thích về Xã</label>
                                <input type="text" class="form-control " id="xa_description" placeholder="Thêm chú thích về Xã" name="xa_description" required>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Bed Information -->

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection