<div class="panel-body">
    {{ csrf_field() }}
    <div id="post_data"></div>
</div>

<script>
    $(document).ready(function() {

        var _token = $('input[name="_token"]').val();

        load_data('', _token);

        function load_data(id = "", _token) {
            $.ajax({
                url: "{{ route('admin.load.more') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }

        $(document).on('click', '#load_more_button', function() {
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_data(id, _token);
        });

    });
</script>