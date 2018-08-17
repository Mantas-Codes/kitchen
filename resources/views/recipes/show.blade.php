@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="text-center">
      <p>{{ $recipe->category->name }}</p>
      <h1>{{ $recipe->name }}</h1>
    </div>

    <div class="mt-5">
      @if($recipe->img)
        <img src="{{ asset('storage/recipes_images/'. $recipe->img) }}" alt="{{ $recipe->name }}"
             style="width: 100%; height: auto;">
      @else
        <img src="{{ asset('storage/recipes_images/noimg.png') }}" alt="{{ $recipe->name }}"
             style="width: 100%; height: auto;">
      @endif
    </div>

    <div class="mt-4">
      {!! $recipe->about !!}
    </div>
    <hr>

    <div class="row">
      <div class="col-md-4">
        {!! $recipe->ingredients !!}
      </div>

      <div class="col-md-8">
        {!! $recipe->preparation !!}
      </div>
    </div>
    <hr>

    <div style="min-height: 200px">

      <div class="row">

        <div class="col-md-4">
          <div class="row">
            <div class="col-md-5">
              @if(!$recipe->user->avatar)
                <img src="{{ asset('storage/avatars/noavatar.jpeg') }}"
                     style="height: 70px; width: auto; border-radius: 50%;">
              @else
                <img src="{{ asset('storage/avatars/' . $recipe->user->avatar) }}"
                     style="height: 70px; width: auto; border-radius: 50%;">
              @endif
            </div>

            <div class="col-md-7">
              <p>Author</p>
              <p>{{ $recipe->user->name }}</p>

              <p>Created</p>
              <p>{{ $recipe->created_at->toFormattedDateString() }}</p>
            </div>
          </div>

        </div>

        <div class="col-md-8">
          <p>About Author</p>
          <p>{{ $recipe->user->profile->about }}</p>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-6" style="background: #a3faff">
        @if($prevRecipe)
          <p>{{ $prevRecipe->category->name }}</p>
          <p>{{ $prevRecipe->name }}</p>
          <a href="{{ route('recipes.show', ['recipe' => $prevRecipe->slug]) }}">PREV Recipe</a>
        @endif
      </div>

      <div class="col-6" style="background: #afffc1">
        @if($nextRecipe)
          <p>{{ $nextRecipe->category->name }}</p>
          <p>{{ $nextRecipe->name }}</p>
          <a href="{{ route('recipes.show', ['recipe' => $nextRecipe->slug]) }}">Next Recipe</a>
        @endif
      </div>


    </div>

  </div>
@endsection
