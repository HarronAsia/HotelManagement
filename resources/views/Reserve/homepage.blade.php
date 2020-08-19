@extends('layouts.app')
@section('content')
<link href="{{ asset('css/reserve.css') }}" rel="stylesheet" type="text/css">
<div class="container-fluid register-form top-buffer-1">
    <div class="form">
        <div class="note">
            <p>Booking a place for {{$room->room_name}}</p>
        </div>
        <form action="#" method="POST">
            <div class="form-content bk">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Personal Information</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="What is your name ?" name="name" value="{{Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="section-to-print" id="section-to-print">
                        <div class="row top-buffer">
                            <div class="col-lg-4">
                                <label for="email">Email ID</label>
                                <input type="email" class="form-control" id="email" placeholder="How can we contact you ?" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="dob">Date of Birth</label>
                                <input name="date" class="form-control" id="dob" onfocus="(this.type='date')" placeholder="{{Auth::user()->profile->dob??''}}" value="{{Auth::user()->profile->dob??''}}" />
                            </div>
                            <div class="col-lg-4">
                                <label for="number">Phone Number</label>
                                <input name="number" class="form-control" id="number" type="tel" placeholder="Please provide your Phone Number" value="{{Auth::user()->profile->number??''}}"/>
                            </div>

                        </div>
                        <div class="row top-buffer">
                            <!-- Address -->
                            <div class="form-group col-lg-3">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="add1" placeholder="Please Provide your address" >
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="inputZip">
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="row top-buffer">
                            <div class="col-sm-4">
                                <label for="phone">Gender / Sex</label></br>
                                <label class="radio-inline"><input type="radio" name="sex" value="male" checked>Male</label>
                                <label class="radio-inline"><input type="radio" name="sex" value="female">Female</label>
                                <label class="radio-inline"><input type="radio" name="sex" value="transgender">Transgender</label>
                            </div>
                        </div>
                    </div>
            </div>
            </fieldset>
            <!-- Educational Qualification -->

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Educational Qualification</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="cname">Collage Name</label>
                        <input type="name" class="form-control" id="title" placeholder="KITS" name="cname">
                    </div>
                    <div class="col-sm-4">
                        <label for="uname">University Name</label>
                        <input type="name" class="form-control" id="fmane" placeholder="JNTUH" name="uname">
                    </div>
                    <div class="col-sm-4">
                        <label for="place">Place</label>
                        <input type="name" class="form-control" id="fmane" placeholder="Manohar" name="place">
                    </div>
                </div>
                <div class="row top-buffer">
                    <div class="col-sm-2">
                        <label for="percentage">Percentage %</label>
                        <input type="number" class="form-control" id="email" placeholder="xyz@xyz.com" name="percentage">
                    </div>
                    <div class="col-sm-2">
                        <label for="backlogs">Backlogs</label>
                        <input name="number" class="form-control" id="dob" type="backlogs" />
                    </div>
                    <div class="col-sm-2">
                        <label for="phone">Specialization</label>
                        <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="phone">Majors / Subjects</label>
                        <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="yop">Year of Passing</label>
                        <input name="number" class="form-control" id="dob" type="yop" />
                    </div>
                    <div class="col-sm-2">
                        <label for="phone">Any Work Exp?</label></br>
                        <div class="radio-inline"><label><input type="radio" name="work" value="yes">Yes</label></div>
                        <div class="radio-inline"><label><input type="radio" name="work" value="no" checked>No</label></div>
                    </div>
                </div>
            </fieldset>
            <!--Educational Qualification -->
            <!-- Study Abroad Plans -->
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Study Abroad Plans</legend>
                <div class="row">
                    <div class="col-sm-8">
                        <label for="cname">Country Intrested For</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="Australia">Australia</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="Canada">Canada</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="UK">UK</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="USA">USA</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="NZ">NZ</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="Italy">Italy</label>
                        <label class="checkbox-inline"><input type="checkbox" name="country[]" value="Germany">Germany</label>
                        <input type="checkbox" name="country[]" id="propertytype-8" value="others">
                        <input id="propertytype_other" name="country[]" type="text" value="" placeholder="other Seperate with coma (,)" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="location">Location</label>
                        <input type="name" class="form-control" id="fmane" placeholder="Sydney" name="location">
                    </div>
                </div>
            </fieldset>
            <!-- Study Abroad Plans -->
            <!-- Test Prep -->
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Test Prep</legend>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="location">Have you taken any Test Prep?</label>
                        <div class="radio-inline"><label><input type="radio" name="testprep" value="yes">Yes</label></div>
                        <div class="radio-inline"><label><input type="radio" name="testprep" value="no" checked>No</label></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="cname">Name of Test Prep</label>
                        <label class="checkbox-inline"><input type="checkbox" name="tname[]" value="IELTS">IELTS</label>
                        <label class="checkbox-inline"><input type="checkbox" name="tname[]" value="PTE">PTE</label>
                        <label class="checkbox-inline"><input type="checkbox" name="tname[]" value="UK">GRE</label>
                        <label class="checkbox-inline"><input type="checkbox" name="tname[]" value="USA">GMAT</label>
                        <label class="checkbox-inline"><input type="checkbox" name="tname[]" value="NZ">TOEFL</label>
                        <input type="checkbox" name="tname[]" id="propertytype-8" value="others"> Others
                        <input id="propertytype_other" name="tname[]" type="text" value="" placeholder="other Seperate with coma (,)" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="location">Overall Marks</label>
                        <input type="number" class="form-control" id="fmane" placeholder="Sydney" name="marks">
                    </div>
                </div>
            </fieldset>
            <!-- Study Abroad Plans -->
            <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
            <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
            <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
        </form>
    </div>
</div>
@endsection