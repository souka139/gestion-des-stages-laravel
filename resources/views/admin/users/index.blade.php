@extends('template')
@section('titre')
    Admin panel
@endsection
<?php 
use App\Models\Role;
$roles=Role::all();
?>
{{-- messagets --}}
@section('content')
@if (Session::get('ok'))
  <div class="alert alert-success">
    {{Session::get('ok')}}
  </div>
@endif
@if (Session::get('no'))
<div class="alert alert-danger">
  {{Session::get('no')}}
</div>
@endif

@if (Session::get('yes'))
  <div class="alert alert-success">
    {{Session::get('yes')}}
  </div>
@endif
@if (Session::get('non'))
<div class="alert alert-danger">
  {{Session::get('non')}}
</div>
@endif
{{-- ********** --}}

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    <a href="{{ route('user.create') }}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-plus"></i> Create new user</a>
</div>

<!-- Content Row -->

<div class="card">
    <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($users as $user)
            <?php ?>
            <tr>
                <th scope="row"><small><strong>{{$user->id}}</strong></small></th>
                <td><small>{{$user->firstName}}</small></td>
                <td><small>{{$user->lastName}}</small></td>
                <td><small>{{$user->email}}</small></td>
                <td><span class="valide success">{{$user->roles->first()->display_name}}</span></td>
                <td>
                  <a href="{{route('user.edit',$user->id)}}" role="button" class="btn btn-primary btn-sm">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$user->id}}').submit();">Delete</button>
                  <form id="delete-user-form-{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="GET" style="display: none">
                      @csrf
                      @method("DELETE")
                  </form>
              </td>
              </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
      {{ $users->links() }}
</div>

   


<!-- /.container-fluid --> 
@endsection


            