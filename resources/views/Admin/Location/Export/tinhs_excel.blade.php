<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tên Tĩnh</th>
            <th>Chú thích về Tĩnh</th>
         
        </tr>
    </thead>
    <tbody>

        @foreach ($tinhs as $tinh)
        <tr>
            <td>{{$tinh->id}}</td>
            <td>{{$tinh->tinh_name}}</td>
            <td>{{$tinh->tinh_description}}</td>

        </tr>
        @endforeach

    </tbody>
</table>