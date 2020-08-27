@foreach($rooms as $room)
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if($room->room_image == NULL)
                                        <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Room Image" style="width: 200px;height:200px;">
                                        @else
                                        <img src="{{asset('storage/hotel/'.$room->hotel->hotel_name.'/'.$room->room_name.'/'.$room->room_image.'/')}}" alt="Card image cap" style="width: 200px;height:200px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6  card-body">
                                        <div class="list-title">
                                            <ul class="list-inline list-unstyled">
                                                <li class="list-inline-item"><a href="{{route('room.show',['locale'=>app()->getLocale(),'id'=>$room->id])}}">
                                                        <h4>{{$room->room_name}}</h4>
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="list-descrip">
                                            <small>{{$room->room_description}}</small>
                                        </div>



                                    </div>
                                    <div class="col-md-3 border-left card-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Very Good</h3>
                                            </li>
                                            <li class="text-secondary"><small>{{$room->comments->count()}} {{__('Reviews')}} </small></li>
                                        </ul>
                                        <a href="{{route('room.show',['locale'=>app()->getLocale(),'id'=>$room->id])}}">
                                            <button type="button" class="btn btn-outline-primary">{{__('Book Now')}}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row mb-3">
                    <div class="col-md-12">
                        <small> {{$rooms->count()}} {{__('properties found in')}} {{__($bed)}}. </small>
                    </div>
                    {{$rooms->links()}}
                </div>