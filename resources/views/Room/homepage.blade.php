@extends('layouts.app')
@section('content')
<link href="{{ asset('css/room.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>

<!--Latest JQuery Light Gallery -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/css/lightgallery.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.3/js/lightgallery.min.js"></script>
<!--Latest JQuery Light Gallery -->
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
                @guest
                <a href="{{route('login')}}" class="btn btn-info">{{__('Follow')}}</a>
                @else
                @if ($follower->follower_id?? '' == Auth::user()->id)
                <a href="{{route('room.unfollow',['room'=>$room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fa fa-bell-slash-o"></i>&ensp;{{__('Unfollow')}}</a>
                @else
                <a href="{{route('room.follow',['room'=>$room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fa fa-bell"></i>&ensp;{{__('Follow')}}</a>
                @endif
                @endif

                @guest
                <a href="{{route('login')}}" class="card-link"><i class="far fa-thumbs-up"></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
                @else
                @if($room->like->user_id??'' == Auth::user()->id)
                <a href="{{route('room.unlike',['room' => $room->id, 'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fas fa-thumbs-up"></i></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
                @else
                <a href="{{route('room.like',['room' => $room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="far fa-thumbs-up"></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
                @endif
                @endif



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
                        <a href="{{route('room.images',$room->id)}}" class="btn btn-primary">Add more Images</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div id="news-slider2" class="owl-carousel">
                            @if($room->images == NULL)

                            @else
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            {!!$calendar->calendar()!!}

            {!! $calendar->script() !!}
            <hr>
            @guest

            @else
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form action="{{route('room.comment',['room'=>$room->id,'user'=>Auth::user()->name])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <textarea class="form-control" name="comment detail" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" id="comment_image" name="comment_image" />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div id="image_preview"></div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                    </form>
                </div>
            </div>
            @endif

            @foreach($comments as $comment)
            <!-- Single Comment -->
            <div class="media mb-4">
                @if($user->profile->avatar_image??'' == NULL)
                <img src="{{asset('storage/user.png')}}" class="d-flex mr-3 rounded-circle" style="width: 50px; height:50px;">
                @else
                <img src="{{asset('storage/user/'.$user->name.'/image'.'/'.$user->profile->avatar_image).'/'}}" class="d-flex mr-3 rounded-circle" style="width:50px; height:50px;">
                @endif
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->user->name}}</h5>
                    <div id="#lightgallery">
                        <p>{{$comment->comment_detail}}</p>
                        @if($comment->comment_image == NULL)
                        <div>

                        </div>
                        @else
                        <div >
                            <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/comment'.'/'.$comment->user->name.'/'.$comment->comment_image)}}" style="width:350px; height:350px;">
                        </div>

                        @endif
                    </div>


                </div>

            </div>
            @endforeach
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
                    @if(Auth::guest())
                    <a class="btn btn-success btn-block" href="{{route('login')}}">Reserve</a>
                    @else
                    <a class="btn btn-success btn-block" href="{{route('room.reserve',$room->id)}}">Reserve</a>
                    @endif
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
    <hr>
</div>

<!-- /.container -->
<script src="{{ asset('js/room.js') }}"></script>

@endsection