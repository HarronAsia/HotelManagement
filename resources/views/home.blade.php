@extends('layouts.app')

@section('content')
<link href="{{ asset('css/mainpage.css') }}" rel="stylesheet" type="text/css">


@include('Homepage.Video')

@include('Homepage.search')

@include('Homepage.Room_Slide')

@include('Homepage.Category_Slide')

@include('Homepage.services')

@endsection