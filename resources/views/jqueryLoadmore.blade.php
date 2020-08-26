<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h1>Load More Data After Click on Load More Button Using Ajax in laravel</h1>
    <div id="load-data">
        <table class="table table-striped">
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
        </table>
    </div>
    <div id="remove-row" class="text-center">
        <button id="btn-more" data-id="{{ $tinh->id }}" class="loadmore-btn">Load More</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn-more', function() {
                var id = $(this).data('id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url: '{{url("loadmoredata")}}',
                    method: "POST",
                    data: {
                        id: id,
                        _token: "{{csrf_token()}}"
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data != '') {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        } else {
                            $('#btn-more').html("No Data");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>