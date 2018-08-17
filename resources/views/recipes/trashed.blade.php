@extends('layouts.app')

@section('content')
  <div class="row">
    @include('partials.admin_sidebar')

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <span>Trashed Recipes</span>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Creator</th>
              <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trashedRecipes as $recipe)
              <tr>
                <td>
                  @if($recipe->img)
                    <img src="{{ asset('storage/recipes_images/' . $recipe->img) }}" style="height: 50px; width: auto;">
                  @else
                    <img src="{{ asset('storage/recipes_images/noimg.png') }}" style="height: 50px; width: auto;">
                  @endif
                </td>
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->user->name }}</td>
                <td>
                  <form action="{{ route('recipes.destroy', ['recipe' => $recipe->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-primary">Delete</button>
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
