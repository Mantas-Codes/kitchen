@extends('layouts.app')

@section('content')

  <div class="col-md-12 mt-4">
    <div class="card">
      <div class="card-header">

        <span>sssas</span>

        <div class="text-right">
          <a href="{{ route('recipes.create') }}" class="btn btn-primary">Create New Recipe</a>
        </div>


      </div>

      <div class="card-body">

        <div class="row justify-content-center">

          @forelse($recipes as $recipe)
            <div class="card col-lg-3 col-md-5 m-3">
              @if($recipe->img)
                <img class="card-img-top" src="{{ asset('storage/recipes_images/'. $recipe->img) }}" alt="{{ $recipe->name }}">
              @else
                <img class="card-img-top" src="{{ asset('storage/recipes_images/noimg.png') }}" alt="{{ $recipe->name }}">
              @endif
              <div class="card-body">
                <p>{{ $recipe->category->name }}</p>
                <a href="{{ route('recipes.show', ['recipe' => $recipe->slug]) }}">{{ $recipe->name }}</a>
              </div>
              <div class="card-body">
                <a href="{{ route('recipes.edit', ['recipe' => $recipe->slug]) }}" class="card-link">Edit</a>
                {{--<a href="#" class="card-link">Delete</a>--}}
                <form action="{{ route('recipes.destroy', ['recipe' => $recipe->id]) }}" method="post" >
                  @csrf
                  @method('DELETE')

                  <button class="card-link">Delete</button>
                </form>
              </div>
            </div>
          @empty
            <div class="text-center">
              <h1>NO RECIPES YET</h1>
              <a href="{{ route('recipes.create') }}" class="btn btn-primary">Create One Now!</a>
            </div>
          @endforelse
        </div>


      </div>
    </div>
  </div>

@endsection
