@extends('layouts.app')

@section('custom_css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('custom_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
  <script>
      $('#summernote1').summernote();
      $('#summernote2').summernote();
      $('#summernote3').summernote();
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">Profile</div>

          <div class="card-body">
            <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="form-group">
                <label for="img">Featured Image</label>
                <input type="file" class="form-control-file" name="img" id="img">
              </div>

              <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="summernote1" name="about" rows="3" ></textarea>
              </div>

              <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control" id="summernote2" name="ingredients" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="preparation">Preparation</label>
                <textarea class="form-control" id="summernote3" name="preparation" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="category_id">Select Category</label>
                <select class="form-control" id="category_id" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
