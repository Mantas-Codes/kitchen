@extends('layouts.app')

@section('content')
<div class="row">
  @include('partials.admin_sidebar')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <span>Trashed Categories</span>
      </div>

      <div class="card-body">
        <table class="table table-hover">
          <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Restore</th>
            <th scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
          @foreach($trashedCategories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td><a href="{{ route('categories.restore', ['category' => $category->id]) }}"
                     class="btn btn-sm btn-outline-success">Restore</a></td>
              <td>
                <form action="{{ route('categories.destroyPermantaly', ['recipe' => $category->id]) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
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
