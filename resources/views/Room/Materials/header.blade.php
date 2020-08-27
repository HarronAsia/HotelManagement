 <!-- Title -->
 <h1 class="mt-4">Room {{$room->room_name}}</h1>

<!-- Author -->
<p class="lead">
    by

    <a href="{{route('profile.view',['locale'=>app()->getLocale(),'user'=>$room->user->name])}}">{{$room->user->name}}</a>
    @guest
    <a href="{{route('login',app()->getLocale())}}" class="btn btn-info pull-right">{{__('Follow')}}</a>
    @else
    @if ($follower->follower_id?? '' == Auth::user()->id)
    <a href="{{route('room.unfollow',['locale'=>app()->getLocale(),'room'=>$room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fa fa-bell-slash-o"></i>&ensp;{{__('Unfollow')}}</a>
    @else
    <a href="{{route('room.follow',['locale'=>app()->getLocale(),'room'=>$room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fa fa-bell"></i>&ensp;{{__('Follow')}}</a>
    @endif
    @endif

    @guest
    <a href="{{route('login',app()->getLocale())}}" class="btn btn-info pull-right"><i class="far fa-thumbs-up"></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
    @else
    @if($room->like->user_id??'' == Auth::user()->id)
    <a href="{{route('room.unlike',['locale'=>app()->getLocale(),'room' => $room->id, 'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="fas fa-thumbs-up"></i></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
    @else
    <a href="{{route('room.like',['locale'=>app()->getLocale(),'room' => $room->id,'user'=>Auth::user()->name])}}" class="btn btn-info pull-right"><i class="far fa-thumbs-up"></i> {{__('Like')}}&ensp;{{$room->likes->count()}}</a>
    @endif
    @endif



</p>

<hr>

<!-- Date/Time -->
<p>{{__('Posted on')}} {{$room->created_at}}</p>
<p>{{__('Hotel Address:')}} {{$room->hotel->hotel_address}}</p>
<hr>

<!-- Preview Image -->
@if($room->room_image == NULL)
<img src="{{asset('storage/default.png')}}" alt="img1" class="card-img-top" alt="Card image cap">
@else

<img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" class="card-img-top">
@endif