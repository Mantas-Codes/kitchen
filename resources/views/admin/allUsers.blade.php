@extends('layouts.app')

@section('content')
  <div class="row">
    @include('partials.admin_sidebar')

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <span>All Users</span>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th scope="col">Avatar</th>
              <th scope="col">Name</th>
              <th scope="col">Joined</th>
              <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <td>
                  @if($user->avatar)
                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}" style="height: 50px; width: auto;">
                  @else
                    <img src="{{ asset('storage/avatars/noavatar.jpeg') }}" style="height: 50px; width: auto;">
                  @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                  <form action="{{ route('admin.deleteUser', ['user' => $user->id]) }}" method="post">
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
