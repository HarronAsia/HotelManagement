<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Created On</th>
            <th>Last Update</th>
            <th>Last Deleted</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($regions as $region)
        <tr>
            <td>{{$region->id}}</td>
            <td>{{$region->title}}</td>
            <td>{{$region->created_at}}</td>
            <td>{{$region->updated_at}}</td>
            <td>{{$region->deleted_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>