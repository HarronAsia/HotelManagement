<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tên Xã</th>
            <th>Chú thích về Xã</th>

            <th>No.</th>
            <th>Tên Quận/Huyện</th>
            <th>Chú thích về Quận/Huyện</th>

            <th>No.</th>
            <th>Tên Tĩnh</th>
            <th>Chú thích về Tĩnh</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($xas as $xa)
        <tr>

            <td>{{$xa->id}}</td>
            <td>{{$xa->xa_name}}</td>
            <td>{{$xa->xa_description}}</td>
            

            <td>{{$xa->huyện_id}}</td>
            <td>{{$xa->huyen_name}}</td>
            <td>{{$xa->huyen_description}}</td>

            <td>{{$xa->tĩnh_id}}</td>
            <td>{{$xa->tinh_name}}</td>
            <td>{{$xa->tinh_description}}</td>

        </tr>
        @endforeach
    </tbody>
</table>