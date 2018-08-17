@extends('layouts.app')

@section('content')
  <div class="row">
    @include('partials.admin_sidebar')
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Dashboard
        </div>

        <div class="card-body">
          <div class="row">
            <div class="card bg-light mb-3 col-md-4">
              <div class="card-header">Recipes</div>
              <div class="card-body">
                <p class="card-text">{{ $totalRecipes }}</p>
              </div>
            </div>

            <div class="card bg-light mb-3 col-md-4">
              <div class="card-header">Users</div>
              <div class="card-body">
                <p class="card-text">{{ $totalUsers }}</p>
              </div>
            </div>

            <div class="card bg-light mb-3 col-md-4">
              <div class="card-header">Categories</div>
              <div class="card-body">
                <p class="card-text">{{ $totalCategories }}</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>

@endsection


