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
            <div>
                <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/comment'.'/'.$comment->user->name.'/'.$comment->comment_image)}}" style="width:350px; height:350px;">
            </div>

            @endif
        </div>


    </div>

</div>
@endforeach