@extends('layouts.app')

@section('content')
<div class="row">
  @include('partials.admin_sidebar')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <span>Edit Category: {{ $category->name }}</span>
      </div>

      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>

    </div>
  </div>
</div>


@endsection
