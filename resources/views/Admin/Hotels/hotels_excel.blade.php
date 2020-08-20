<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Addresss</th>
            <th>Owner</th>
            <th>Number of Rooms</th>
            <th>Created On</th>
            <th>Last Updated</th>
            <th>Last Deleted</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($hotels as $hotel)
        <tr>
            <td>{{$hotel->id}}</td>
            <td>{{$hotel->hotel_name}}</td>
            <td>{{$hotel->hotel_description}}</td>
            <td>{{$hotel->hotel_address}}</td>
            <td>{{$hotel->user->name}}</td>
            <td>{{$hotel->rooms->count()}}</td>
            <td>{{$hotel->created_at}}</td>
            <td>{{$hotel->updated_at}}</td>
            <td>{{$hotel->deleted_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>