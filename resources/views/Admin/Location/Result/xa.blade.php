<thead class="thead-dark">
    <tr>
        <th scope="col">Xã</th>
        <th scope="col">Tên Xã</th>
        <th scope="col">Thuộc Huyện</th>
        <th scope="col">Tên Huyện</th>
        <th scope="col">Thuộc Tĩnh</th>
        <th scope="col">Tên Tĩnh</th>
        <th scope="col">Ghi Chú</th>
    </tr>
</thead>
<tbody>
    @foreach($xas as $xa)
    <tr>
        <th scope="row">{{$xa->id}}</th>
        <td>{{$xa->xa_name}}</td>
        <td scope="row">{{$xa->huyện_id}}</td>
        <td>{{$xa->huyen_name}}</td>
        <td scope="row">{{$xa->tĩnh_id}}</td>
        <td>{{$xa->tinh_name}}</td>
        <td>{{$xa->xa_description}}</td>
    </tr>
    @endforeach
</tbody>
