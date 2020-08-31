<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tên Tĩnh</th>
            <th>Chú thích về Tĩnh</th>

            <th>No.</th>
            <th>Tên Quận/Huyện</th>
            <th>Chú thích về Quận/Huyện</th>
         
        </tr>
    </thead>
    <tbody>

        @foreach ($huyens as $huyen)
        <tr>
            <td>{{$huyen->id}}</td>
            <td>{{$huyen->huyen_name}}</td>
            <td>{{$huyen->huyen_description}}</td>

            <td>{{$huyen->tĩnh_id}}</td>
            <td>{{$huyen->tinh_name??''}}</td>
            <td>{{$huyen->tinh_description??''}}</td>

        </tr>
        @endforeach
    </tbody>
</table>