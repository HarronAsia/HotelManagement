@extends('layouts.app')
@section('content')
<link href="{{ asset('css/room.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">Room {{$room->room_name}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="{{route('profile.view',$room->user->name)}}">{{$room->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$room->created_at}}</p>
            <p>Hotel Address: {{$room->hotel->hotel_address}}</p>
            <hr>

            <!-- Preview Image -->
            @if($room->room_image == NULL)
            <img src="{{asset('storage/default.png')}}" alt="img1" class="card-img-top" alt="Card image cap">
            @else

            <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" class="card-img-top">
            @endif
            <hr>

            <!-- Post Content -->
            <p class="lead">{{$room->room_description}}</p>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="h3">Other Images of the room</h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div id="news-slider2" class="owl-carousel">
                            <div class="post-slide2">
                                <div class="post-img">
                                    <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt="">
                                </div>
                            </div>

                            <div class="post-slide2">
                                <div class="post-img">
                                    <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-2.jpg" alt="">
                                </div>
                            </div>

                            <div class="post-slide2">
                                <div class="post-img">
                                    <img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-3.jpg" alt="">
                                </div>
                            </div>

                            <div class="post-slide2">
                                <div class="post-img">
                                    <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-4.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            {!!$calendar->calendar()!!}

            {!! $calendar->script() !!}
            <hr>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Categories Widget -->
            <div class="card my-3">
                <h5 class="card-header">Room Type</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">{{$room->room_type}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Room Information</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <p> <strong>Room on floor:</strong> {{$room->room_floor}}</p>
                            <p> <strong>Room Number:</strong> {{$room->room_number}}</p>
                            <p> <strong>Room Price:</strong> {{$room->room_price}}</p>
                        </div>
                        <div class="col-lg-7">
                            <p> <strong>Room Condition:</strong> {{$room->room_condition}}</p>
                            <p> <strong>Room Status:</strong> {{$room->room_status}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Hotel Image</h5>
                <div class="card-body">
                    @if($room->hotel->hotel_image == NULL)
                    <img src="{{asset('storage/default.png')}}" alt="Hotel Image" class="card-img-top">
                    @else
                    <img id="image_preview_container" src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->hotel->hotel_image.'/')}}" class="form-control" alt="preview Hotel Image" class="card-img-top">
                    @endif
                </div>
            </div>
            <!-- tweeter -->
            <div class="card my-4">
                <h5 class="card-header">Other Information</h5>
                <div class="card-body">
                    <a class="btn btn-success btn-block" href="{{route('room.reserve',$room->id)}}">Reserve</a>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<script src="{{ asset('js/room.js') }}"></script>
@endsection