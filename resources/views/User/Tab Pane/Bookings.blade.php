<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Checkin</th>
                        <th scope="col">Checkout</th>
                        <th scope="col">Room</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dates as $date)
                    <tr>
                        <th scope="row">{{$date->id}}</th>
                        <td>{{$date->checkin}}</td>
                        <td>{{$date->checkout}}</td>
                        <td>
                            <a href="{{route('room.show',['locale'=>app()->getLocale(),'id'=>$date->bookable_id])}}">
                                {{$date->bookable_id}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>