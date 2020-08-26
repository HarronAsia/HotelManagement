@extends('layouts.admin.app')

@section('title','Searching Location')

@section('content')

<form action="{{route('admin.searching')}}" method="GET" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend>ĐỐI CHIẾU ĐƠN VỊ HÀNH CHÍNH</legend>

        <!-- Select Basic -->
        <div class="form-group">
            <div class="row">
                <label class="col-md-12 control-label" for="radius">Cấp</label>
                <div class="col-md-4 ">
                    <select id="radius" name="select_query" class="form-control" onchange="showDiv(this)">
                        <option id="Tĩnh1" name="select_query" value="Tĩnh" selected>Tĩnh</option>
                        <option id="Huyện1" name="select_query" value="Huyện">Huyện</option>
                        <option id="Xã1" name="select_query" value="Xã">Xã</option>
                    </select>
                </div>
                <br>
                <div class="col-md-4 " id="hidden_div" style="display:none;">
                    <select id="radius" name="select2_query" class="form-control">
                        @foreach($tinhs as $tinh)
                        <option id="Tĩnh" name="select2_query" value="Tĩnh" hidden selected>Tĩnh</option>
                        <option name="select2_query" value="{{$tinh->id}}">{{$tinh->tinh_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-4 " id="hidden_div2" style="display:none;">
                    <select id="radius" name="select3_query" class="form-control">
                        @foreach($huyens as $huyen)
                        <option id="Tĩnh" name="select3_query" value="Tĩnh" hidden selected>Quận/Huyện</option>
                        <option name="select3_query" value="{{$huyen->id}}">{{$huyen->huyen_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-md-12 control-label" for="radius">Tên</label>
                <div class="col-lg-12">
                    <input type="text" id="tinh_query" name="tinh_query" class="form-control" placeholder="Nhập tên Tĩnh ">
                    <input type="text" id="huyen_query" name="huyen_query" class="form-control" placeholder="Nhập tên Tĩnh Huyện" style="display: none;">
                    <input type="text" id="xa_query" name="xa_query" class="form-control" placeholder="Nhập tên Tĩnh Huyện hoặc Xã" style="display: none;">
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <div class="col-md-4  control-label">
                <button id="submit" name="submit" class="btn btn-primary">Tìm Kiếm</button>
                <a href="{{route('admin.searching.create')}}" class="btn btn-primary">Thêm Địa chỉ</a>
            </div>
        </div>
    </fieldset>
</form>
<!----------------------------------------------------------------- --->
<div id="hidden_div3" style="display:block;">
    @include('Admin.Location.Form.tinh')
</div>

<div id="hidden_div4" style="display:none;">
    @include('Admin.Location.Form.huyen')
</div>

<div id="hidden_div5" style="display:none;">
    @include('Admin.Location.Form.xa')
</div>
<!----------------------------------------------------------------- --->
<div id="hidden_table1" style="display:block;">
    @include('Admin.Location.Result.tinh')
</div>

<div id="hidden_table2" style="display:none;">
    @include('Admin.Location.Result.huyen')
</div>

<div id="hidden_table3" style="display:none;">
    @include('Admin.Location.Result.xa')
</div>
<!----------------------------------------------------------------- --->
<script type="text/javascript">
    function showDiv(select) {
        if (select.value == "Huyện") {

            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div2').style.display = "none";
            document.getElementById('hidden_div3').style.display = "none";
            document.getElementById('hidden_div4').style.display = "block";
            document.getElementById('hidden_div5').style.display = "none";

            document.getElementById('hidden_table1').style.display = "none";
            document.getElementById('hidden_table2').style.display = "block";
            document.getElementById('hidden_table3').style.display = "none";

            document.getElementById('tinh_query').style.display = "none";
            document.getElementById('huyen_query').style.display = "block";
            document.getElementById('xa_query').style.display = "none";

        } else if (select.value == "Xã") {
            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div2').style.display = "block";
            document.getElementById('hidden_div3').style.display = "none";
            document.getElementById('hidden_div4').style.display = "none";
            document.getElementById('hidden_div5').style.display = "block";

            document.getElementById('hidden_table1').style.display = "none";
            document.getElementById('hidden_table2').style.display = "none";
            document.getElementById('hidden_table3').style.display = "block";

            document.getElementById('tinh_query').style.display = "none";
            document.getElementById('huyen_query').style.display = "none";
            document.getElementById('xa_query').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
            document.getElementById('hidden_div2').style.display = "none";
            document.getElementById('hidden_div3').style.display = "block";
            document.getElementById('hidden_div4').style.display = "none";
            document.getElementById('hidden_div5').style.display = "none";

            document.getElementById('hidden_table1').style.display = "block";
            document.getElementById('hidden_table2').style.display = "none";
            document.getElementById('hidden_table3').style.display = "none";

            document.getElementById('tinh_query').style.display = "block";
            document.getElementById('huyen_query').style.display = "none";
            document.getElementById('xa_query').style.display = "none";
        }
    }

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
@endsection