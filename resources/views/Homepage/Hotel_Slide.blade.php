<!--********************************************************************************* Popular Hotel *******************************************************-->
<div class="container-fluid">
    <h1 class="h1 " style="padding-bottom: 20px;">Popular Room Available Now</h1>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider2" class="owl-carousel">
                @foreach($rooms->take(5) as $room)
                <div class="post-slide2">
                    <div class="post-img">
                        <a href="{{route('room.show',$room->id)}}">
                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 250px;height:250px">
                        </a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title"><a href="#">{{$room->room_name}} </a></h3>
                        <p class="post-description">
                            {{$room->room_description}}
                        </p>
                        <hr>
                        <ul class="post-bar">
                            <li><i class="fa fa-calendar"></i> {{$room->created_at}}</li>
                            <hr>
                            <li style="font-size: 25px;">
                                <i class="fa fa-users"></i>
                                {{$room->room_type}}
                            </li>
                            <li style="font-size: 25px;">
                                <i class="fa fa-bed"></i>
                                {{$room->bed->bed_type}}
                            </li>
                            <li style="font-size: 25px;">
                                <i class="fa fa-info"></i>
                                {{$room->room_condition}}
                            </li>

                        </ul>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--********************************************************************************* Popular Hotel *******************************************************-->