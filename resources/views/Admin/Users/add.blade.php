@extends('layouts.admin.app')

@section('title','Add New User')
@section('content')
<link href="{{ asset('css/admin/users/main.css') }}" rel="stylesheet" type="text/css">
<div class="container register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Add User Profile </p>
        </div>
        <div class="form-content bk">
            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
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
                <!-- Avatar -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Profile Image and Background</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback{{ $errors->has('avatar_image') ? ' has-error' : '' }}">
                                <label class="avatar_image">
                                    <input type="file" name="avatar_image" id="image" class="form-control ">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <img id="image_preview_container" src="{{asset('storage/user.png')}}" class="form-control" alt="preview Avatar Image" style="width:450px;height:450xpx;">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Avatar  -->

                <!-- User Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">User Information</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control " id="name" placeholder="Enter Your Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control " id="username" placeholder="Enter Your Username" name="username">

                            </div>
                        </div>
                    </div>

                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control " id="email" placeholder="Enter Your Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pass_show has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password </label>

                                    <input type="password" class="form-control " id="password" placeholder="Enter Your Password" name="password" required>

                                </div>
                            </div>
                        </div>

                        <div class="row top-buffer">
                            <div class="form-group has-feedback{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role">User Role</label>
                                <select class="form-control " name="role" id="role" required>
                                    <option value="User" selected>User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- User Information -->

                <!-- Personal Information -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Personal Information</legend>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group has-feedback{{ $errors->has('number') ? ' has-error' : '' }}">
                                <label for="number">Number</label>
                                <input type="text" class="form-control " id="number" placeholder="Enter your Phone Number" name="number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback{{ $errors->has('place') ? ' has-error' : '' }}">
                                <label for="place">Address</label>
                                <input type="text" class="form-control " id="place" placeholder="Enter your Address" name="place">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group has-feedback{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label for="job">Job</label>
                                <input type="text" class="form-control " id="job" placeholder="Enter Your Profession" name="job">
                            </div>
                        </div>
                    </div>
                    <div class="row top-buffer">
                        <div class="col-ms-3">
                            <div class="form-group has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control " id="dob" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender">Gender</label>
                                <select class="form-control " name="gender" id="gender">
                                    <option value="Male">{{__('Male')}}</option>
                                    <option value="Female">{{__('Female')}}</option>
                                    <option value="Third Party">{{__('Third Party')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback{{ $errors->has('blood') ? ' has-error' : '' }}">
                                <label for="blood">Blood Type</label>
                                <select class="form-control " name="blood" id="blood">
                                    <option value="A">{{__('A')}}</option>
                                    <option value="B">{{__('B')}}</option>
                                    <option value="AB">{{__('AB')}}</option>
                                    <option value="O">{{__('O')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback{{ $errors->has('relationship') ? ' has-error' : '' }}">
                                <label for="relationship">Relationship</label>
                                <select class="form-control " name="relationship" id="relationship">
                                    <option value="Single">{{__('Single')}}</option>
                                    <option value="In Relationship">{{__('In Relationship')}}</option>
                                    <option value="Married">{{__('Married')}}</option>
                                    <option value="Just Divorced">{{__('Just Divorced')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Personal Information -->

                <!-- Social Network -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Social Network</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}">
                                <label for="google_plus_link">Google Plus Link:</label>
                                <input type="text" class="form-control " id="google_plus_link" placeholder="Enter your Google Plus Link" name="google_plus_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}">
                                <label for="yahoo_link">Yahoo Link:</label>
                                <input type="text" class="form-control " id="yahoo_link" placeholder="Enter your Yahoo Link" name="yahoo_link">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}">
                                <label for="skype_link">Skype Link:</label>
                                <input type="text" class="form-control " id="skype_link" placeholder="Enter your Skype Link" name="skype_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}">
                                <label for="facebook_link">Facebook Link:</label>
                                <input type="text" class="form-control " id="facebook_link" placeholder="Enter your Facebook Link" name="facebook_link">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}">
                                <label for="twitter_link">Twitter Link:</label>
                                <input type="text" class="form-control " id="twitter_link" placeholder="Enter your Twitter Link" name="twitter_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback{{ $errors->has('instagram_link') ? ' has-error' : '' }}">
                                <label for="instagram_link">Instagram Link:</label>
                                <input type="text" class="form-control " id="instagram_link" placeholder="Enter your Instagram Link" name="instagram_link">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Social Network -->

                <!-- Short Introduction -->
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Short Introduction</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group has-feedback{{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="bio">Bio:</label>
                                <textarea class="form-control " rows="6" id="bio" placeholder="Enter your short Introduction" name="bio"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Short Introduction -->

                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection