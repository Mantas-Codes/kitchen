@extends('layouts.app')

@section('content')
<div class="row">
  @include('partials.admin_sidebar')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <span>All Categories</span>
      </div>

      <div class="card-body">
        <table class="table table-hover">
          <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td><a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                     class="btn btn-sm btn-outline-primary">Edit</a></td>
              <td>
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Trash</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
