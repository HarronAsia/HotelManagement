@extends('layouts.admin.app')

@section('title','Searching Location')

@section('content')

<form action="{{route('room.search')}}" method="GET" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend>ĐỐI CHIẾU ĐƠN VỊ HÀNH CHÍNH</legend>

        <!-- Select Basic -->
        <div class="form-group">
            <div class="row">
                <label class="col-md-12 control-label" for="radius">Cấp</label>
                <div class="col-md-4 ">
                    <select id="radius" name="select_query" class="form-control" onchange="showDiv(this)">
                        <option id="Tĩnh" name="select_query" value="Tĩnh" selected>Tĩnh</option>
                        <option id="Huyện" name="select_query" value="Huyện">Huyện</option>
                        <option id="Xã" name="select_query" value="Xã">Xã</option>
                    </select>
                </div>
                <br>
                <div class="col-md-4 " id="hidden_div" style="display:none;" name="select2_query">
                    <select id="radius" name="radius" class="form-control">
                        @foreach($tinhs as $tinh)
                        <option id="Tĩnh" name="select2_query" value="Tĩnh" hidden selected>Tĩnh</option>
                        <option name="select2_query" value="{{$tinh->id}}">{{$tinh->tinh_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-4 " id="hidden_div2" style="display:none;" name="select3_query">
                    <select id="radius" name="radius" class="form-control">
                        @foreach($tinhs as $tinh)
                        <option id="Tĩnh" name="select3_query" value="Tĩnh" hidden selected>Huyện</option>
                        <option name="select3_query" value="{{$tinh->id}}">{{$tinh->tinh_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <label class="col-md-12 control-label" for="radius">Tên</label>
                <div class="col-lg-12">
                   <input type="text" id="input_query" name="input_query" class="form-control" placeholder="Nhập tên Tĩnh Huyện hoặc Xã">
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

<div id="hidden_div3" style="display:block;">
    @include('Admin.Location.Form.tinh')
</div>
<div id="hidden_div4" style="display:none;">
    @include('Admin.Location.Form.huyen')
</div>
<div id="hidden_div5" style="display:none;">
    @include('Admin.Location.Form.xa')
</div>

<div id="hidden_table1" style="display:block;">
    <table class="table table-striped">
        @include('Admin.Location.Result.tinh')
    </table>
    {{$tinhs->links()}}
</div>
<div id="hidden_table2" style="display:none;">
    <table class="table table-striped">
        @include('Admin.Location.Result.huyen')
    </table>
    {{$huyens->links()}}
</div>
<div id="hidden_table3" style="display:none;">
    <table class="table table-striped">
        @include('Admin.Location.Result.xa')
    </table>
    {{$xas->links()}}
</div>
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

        } else if (select.value == "Xã") {
            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div2').style.display = "block";
            document.getElementById('hidden_div3').style.display = "none";
            document.getElementById('hidden_div4').style.display = "none";
            document.getElementById('hidden_div5').style.display = "block";

            document.getElementById('hidden_table1').style.display = "none";
            document.getElementById('hidden_table2').style.display = "none";
            document.getElementById('hidden_table3').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
            document.getElementById('hidden_div2').style.display = "none";
            document.getElementById('hidden_div3').style.display = "block";
            document.getElementById('hidden_div4').style.display = "none";
            document.getElementById('hidden_div5').style.display = "none";


            document.getElementById('hidden_table2').style.display = "none";
            document.getElementById('hidden_table3').style.display = "none";
        }
    }
</script>
@endsection