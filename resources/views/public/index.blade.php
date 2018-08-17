@extends('layouts.app')

@section('content')
  <div style="">
    <div style="min-width: 100%; height: 500px; background-color: #1d68a7;">
      <p>category</p>
      <h1>Name</h1>
      <p>author</p>
      <a href="">View</a>
    </div>
  </div>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Recipes</h2>
    <div class="row justify-content-center">

      @for($i = 0; $i < 9; $i++)
        <div class="card col-lg-3 col-md-5 m-3">
          {{--<img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">--}}
          <div class="card-img-top" style="height: 180px; width: 100%; background-color: rebeccapurple;"></div>
          <div class="card-body">
            <p>category</p>
            <p>Name</p>
          </div>
        </div>
      @endfor
    </div>
  </div>
@endsection
