@extends('layouts.admin.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<div class="container-fluid">

    {!!$calendar->calendar()!!}

    {!! $calendar->script() !!}

</div>

@endsection