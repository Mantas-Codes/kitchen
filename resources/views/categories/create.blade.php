@extends('layouts.app')

@section('content')
<div class="row">
  @include('partials.admin_sidebar')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <span>Create Category</span>
      </div>

      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>

          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>

    </div>
  </div>
</div>


@endsection
