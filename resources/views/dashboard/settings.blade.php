@extends('dashboard.index')

@section('content')
<div class="container">
  <h2>Website Settings</h2>
  <form action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group mb-3">
          <label for="site_name_1">Site Name</label>
          <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter Website Name">
      </div>

      <div class="form-group mb-3">
          <label for="site_logo">Site Logo</label>
          <input type="file" class="form-control" id="site_logo" name="site_logo">
      </div>

      <div class="form-group mb-3">
          <label for="facebook">Facebook</label>
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook URL">
      </div>

      <div class="form-group mb-3">
          <label for="twitter">Twitter</label>
          <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter Twitter URL">
      </div>

      <div class="form-group mb-3">
          <label for="linkedin">LinkedIn</label>
          <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter LinkedIn URL">
      </div>

      <div class="form-group mb-3">
        <label for="Copyright">Copyright</label>
        <input type="text" class="form-control" id="Copyright" name="Copyright" placeholder="Enter Copyright">
    </div>



      <button type="submit" class="btn btn-success">Save</button>
  </form>
</div>

@endsection