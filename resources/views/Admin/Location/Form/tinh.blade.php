<form method="post" action="{{ route('admin.tinh.import',app()->getLocale())}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="excel">Your Sheet file</label>
        <input type="file" class="form-control" name="excel" required>
    </div>
    <br />
    <button type="submit" class="btn btn-success">Lấy danh sách Tĩnh</button>

</form>

