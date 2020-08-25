@extends('layouts.app')

@section('title',$user->name)

@section('content')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.css">
<!-- partial -->
<div class="main-panel">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="profile-card">

                        <div class="profile-header">

                            <div class="cover-image">
                                @if($user->profile->avatar_image??'' == NULL)
                                <img src="{{asset('storage/user.png')}}" class="img" style="width: 360px; height:200px;">
                                @else
                                <img src="{{asset('storage/user/'.$user->name.'/image'.'/'.$user->profile->avatar_image).'/'}}" class="img" style="width:360pxpx; height:200px;">
                                @endif
                            </div>
                        </div>

                        <div class="profile-content">
                            <div class="profile-name">{{$user->name}}</div>
                            <div class="profile-designation">{{$user->profile->job??''}}</div>
                            <p class="profile-description">{{$user->profile->bio??''}}.</p>
                            <ul class="profile-info-list nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="#timeline" id="timeline-tab" data-toggle="tab" class="profile-info-list-item" role="tab" aria-controls="timeline" aria-selected="true">
                                        <i class="mdi mdi-eye"></i>Timeline
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#saved" id="saved-tab" data-toggle="tab" class="profile-info-list-item" role="tab" aria-controls="saved" aria-selected="false">
                                        <i class="mdi mdi-bookmark-check"></i>Saved
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#friends" id="friends-tab" data-toggle="tab" class="profile-info-list-item" role="tab" aria-controls="friends" aria-selected="false">
                                        <i class="mdi mdi-movie"></i>Friends
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about" id="about-tab" data-toggle="tab" class="profile-info-list-item" role="tab" aria-controls="about" aria-selected="false">
                                        <i class="mdi mdi-account"></i>About
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="tab-content profile-tab" id="myTabContent">
                    <!-------------------------------------------------------------------------------------    Timeline Tab start--------------------------------------------------------------->
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        @include('User.Tab Pane.Timeline')
                    </div>
                    <!-------------------------------------------------------------------------------------    About Tab end--------------------------------------------------------------->

                    <!-------------------------------------------------------------------------------------    Daved Tab start--------------------------------------------------------------->
                    <div class="tab-pane fade " id="saved" role="tabpanel" aria-labelledby="saved-tab">
                        @include('User.Tab Pane.saved')
                    </div>
                    <!-------------------------------------------------------------------------------------    About Tab end--------------------------------------------------------------->

                    <!-------------------------------------------------------------------------------------    Friends Tab start--------------------------------------------------------------->
                    <div class="tab-pane fade " id="friends" role="tabpanel" aria-labelledby="friends-tab">
                        @include('User.Tab Pane.Friends')
                    </div>
                    <!-------------------------------------------------------------------------------------    About Tab end--------------------------------------------------------------->

                    <!-------------------------------------------------------------------------------------    About Tab start--------------------------------------------------------------->
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        @include('User.Tab Pane.about')
                    </div>
                    <!-------------------------------------------------------------------------------------    About Tab end--------------------------------------------------------------->
                </div>
            </div>

        </div>

    </div>
</div>
<script src="{{ asset('js/profile.js') }}"></script>
@endsection