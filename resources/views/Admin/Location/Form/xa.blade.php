<form method="post" action="{{ route('admin.xa.import')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="excel">Your Sheet file</label>
        <input type="file" class="form-control" name="excel">
    </div>
    <br />
    <button type="submit" class="btn btn-success">Lấy danh sách Xã</button>
</form>