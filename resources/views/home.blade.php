@extends('layouts.app')

@section('content')
<link href="{{ asset('css/mainpage.css') }}" rel="stylesheet" type="text/css">


@include('Homepage.Video')

@include('Homepage.search')

@include('Homepage.Hotel_Slide')

@include('Homepage.Hotel_Categories')

@include('Homepage.Hotel_Region')

<hr>
@endsection