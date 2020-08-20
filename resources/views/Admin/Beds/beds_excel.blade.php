<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Room Number</th>
            <th>In Hotel</th>
           
            <th>Created On</th>
            <th>Last Update</th>
            <th>Last Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($beds as $bed)
        <tr>
            <td>{{$bed->id}}</td>
            <td>{{$bed->bed_name}}</td>
            <td>{{$bed->bed_type}}</td>
            <td>{{$bed->room->room_number}}</td>
            <td>{{$bed->room->hotel->hotel_name}}</td>
           
            <td>{{$bed->created_at}}</td>
            <td>{{$bed->updated_at}}</td>
            <td>{{$bed->deleted_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>