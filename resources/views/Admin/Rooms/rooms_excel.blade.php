<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>On Floor</th>
            <th>Room Number</th>

            <th>Room Price</th>
            <th>Room Type</th>
            <th>Room Condition</th>
            <th>Room Status</th>
            <th>Room Description</th>

            <th>Checkin</th>
            <th>Checkout</th>
            <th>Time Start</th>
            <th>Time End</th>

            <th>Customer</th>
           
            <th>Created On</th>
            <th>Last Update</th>
            <th>Last Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rooms as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->room_name}}</td>
            <td>{{$room->room_floor}}</td>
            <td>{{$room->room_number}}</td>

            <td>{{$room->room_price}}</td>
            <td>{{$room->room_type}}</td>
            <td>{{$room->room_condition}}</td>
            <td>{{$room->room_status}}</td>

            <td>{{$room->date->checkin}}</td>
            <td>{{$room->date->checkout}}</td>
            <td>{{$room->date->time_begin}}</td>
            <td>{{$room->date->time_end}}</td>
           
            <td>{{$room->user->name??''}}</td>
           
            <td>{{$room->created_at}}</td>
            <td>{{$room->updated_at}}</td>
            <td>{{$room->deleted_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>