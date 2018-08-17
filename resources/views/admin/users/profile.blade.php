@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">Profile</div>

          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
              </div>

              <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control-file" name="avatar" id="avatar">
              </div>

              <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" name="facebook" id="facebook">
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
