@extends('template')
@section('titre')
    edit password
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4">Changer le password</h1>
</div>
<!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
<form class="user" method="POST" action="{{ route('profile.changePass',$user->id) }}">
@csrf

<div class="container">
  <div class="row gutters">

  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Change password</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="eMail">password</label>
            <input type="password" class="form-control" name="password" placeholder="entrer le nouveau password">
          </div>
        </div>
      </div>
      
      <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="fullName">confirme password</label>
              <input type="password" class="form-control" name="password-confirm" placeholder="Confirme password">
            </div>
          </div>      
        </div>

      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="text-left">
            <button class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                {{ __('update password') }}
           </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
  </div>
</div>
</form>
@endsection
