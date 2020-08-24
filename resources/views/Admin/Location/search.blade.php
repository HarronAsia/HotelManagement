@extends('layouts.admin.app')

@section('title','Searching Location')

@section('content')
<form action="#" method="GET" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>ĐỐI CHIẾU ĐƠN VỊ HÀNH CHÍNH</legend>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-6 control-label" for="radius">Cấp</label>
            <div class="col-md-6">
                <select id="radius" name="select_query" class="form-control" onchange="showDiv(this)">
                    <option id="Tĩnh" name="select_query" value="Tĩnh" selected>Tĩnh</option>
                    <option id="Huyện" name="select_query" value="Huyện">Huyện</option>
                    <option id="Xã" name="select_query" value="Xã">Xã</option>
                </select>
            </div>
            <br>
            <div class="col-md-6 control-label" id="hidden_div" style="display:none;" name="select2_query">
                <select id="radius" name="radius" class="form-control">
                    <option id="Tĩnh" name="select2_query" value="Tĩnh">Tĩnh</option>
                    <option id="Huyện" name="select2_query" value="Huyện">Huyện</option>
                    <option id="Xã" name="select2_query" value="Xã">Xã</option>
                </select>
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary">Search</button>

            </div>

        </div>

    </fieldset>
</form>

<div id="hidden_div2" style="display:block;">
    <form method="post" action="{{ route('admin.tinh.import')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="excel">Your Sheet file</label>
            <input type="file" class="form-control" name="excel">
        </div>
        <br />
        <button type="submit" class="btn btn-success">Lấy danh sách Tĩnh</button>
    </form>
</div>
<div id="hidden_div3" style="display:none;">
    <form method="post" action="{{ route('admin.huyen.import')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="excel">Your Sheet file</label>
            <input type="file" class="form-control" name="excel">
        </div>
        <br />
        <button type="submit" class="btn btn-success">Lấy danh sách Huyện</button>
    </form>
</div>
<div id="hidden_div4" style="display:none;">
    <form method="post" action="{{ route('admin.xa.import')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="excel">Your Sheet file</label>
            <input type="file" class="form-control" name="excel">
        </div>
        <br />
        <button type="submit" class="btn btn-success">Lấy danh sách Xã</button>
    </form>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Tỉnh</th>
            <th scope="col">Tên Tỉnh</th>
            <th scope="col">Quận Huyện</th>
            <th scope="col">Tên Quận Huyện</th>
            <th scope="col">Xã</th>
            <th scope="col">Tên Xã</th>
            <th scope="col">Phường</th>
            <th scope="col">Tên Phường</th>
            <th scope="col">Ghi Chú</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <th scope="row">1</th>
            <td>@mdo</td>
            <th scope="row">1</th>
            <td>Mark</td>
            <th scope="row">1</th>
            <td>Otto</td>
            <td>Otto</td>

        </tr>

    </tbody>
</table>

<script type="text/javascript">
    function showDiv(select) {
        if (select.value == "Huyện") {
            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div2').style.display = "none";
            document.getElementById('hidden_div3').style.display = "block";
            document.getElementById('hidden_div4').style.display = "none";
        } else if (select.value == "Xã") {
            document.getElementById('hidden_div').style.display = "block";
            document.getElementById('hidden_div2').style.display = "none";
            document.getElementById('hidden_div3').style.display = "none";
            document.getElementById('hidden_div4').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
            document.getElementById('hidden_div2').style.display = "block";
            document.getElementById('hidden_div3').style.display = "none";
            document.getElementById('hidden_div4').style.display = "none";
        }
    }
</script>
@endsection