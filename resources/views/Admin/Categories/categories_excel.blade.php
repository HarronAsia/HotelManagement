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

        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td>{{$category->deleted_at}}</td>
        </tr>
        @endforeach

    </tbody>
</table>