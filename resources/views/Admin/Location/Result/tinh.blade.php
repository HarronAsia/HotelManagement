<thead class="thead-dark">
    <tr>
        <th scope="col">Tĩnh</th>
        <th scope="col">Tên Tĩnh</th>
        <th scope="col">Ghi Chú</th>
    </tr>
</thead>
<tbody>
    @foreach($tinhs as $tinh)
    <tr>
        <th scope="row">{{$tinh->id}}</th>
        <td>{{$tinh->tinh_name}}</td>
        <td>{{$tinh->tinh_description}}</td>

    </tr>
    @endforeach
</tbody>
