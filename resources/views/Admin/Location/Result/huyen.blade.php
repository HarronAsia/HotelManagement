<thead class="thead-dark">
    <tr>
        <th scope="col">Huyện</th>
        <th scope="col">Tên Huyện</th>
        <th scope="col">Thuộc Tĩnh</th>
        <th scope="col">Tên Tĩnh</th>
        <th scope="col">Ghi Chú</th>
    </tr>
</thead>
<tbody>
    @foreach($huyens as $huyen)
    <tr>
        <th scope="row">{{$huyen->id}}</th>
        <td>{{$huyen->huyen_name}}</td>
        <td scope="row">{{$huyen->tĩnh_id}}</td>
        <td>{{$huyen->tinh_name}}</td>
        <td>{{$huyen->huyen_description}}</td>
    </tr>
    @endforeach
</tbody>
