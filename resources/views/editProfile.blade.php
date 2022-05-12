@extends('template')
@section('titre')
    edit Profile
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4">Edit Profile</h1>
</div>
<!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
<form class="user" method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
@csrf

<div class="container">
  <div class="row gutters">
  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-body">
      <div class="account-settings">
        <div class="user-profile">
          <div class="user-avatar">
            @if (Auth::user()->profile_pic!="users/undraw_profile.svg")
            <img class="card-img-top"
            src="/storage/images/{{Auth::user()->profile_pic}}">
            @else
                <img class="card-img-top"
                src="/img/undraw_profile.svg">
            @endif
          </div>
          <h5 class="user-name">{{Auth::user()->firstName}} {{Auth::user()->lastName}}</h5>
          <h6 class="user-email">{{Auth::user()->email}}</h6>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Personal Details</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="eMail">nom</label>
            <input type="text" class="form-control" name="lastName" value="{{$user->lastName}}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="fullName">prenom</label>
            <input type="text" class="form-control" name="firstName" value="{{$user->firstName}}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="phone">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label>Current picture</label>
              <input type="text" class="form-control" value="{{$user->profile_pic}}" disabled>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="pic">Changer la photo</label>
              <input type="file" class="form-control" name="profile_pic" value="{{$user->profile_pic}}">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="pic">Changer password</label>
              <input type="password" class="form-control"disabled name="password" value="{{$user->password}}">
             <small><a href="{{route('profile.passEdit',Auth::user()->id)}}">clickez ici pour changer le password</a></small> 
            </div>
          </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mt-3 mb-2 text-primary">Autre</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" value="{{$user->phone}}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>Adress</label>
            <input type="text" name="adress" class="form-control" placeholder="Enter your adress" value="{{$user->adress}}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>CIN</label>
            <input type="text" name="cin" class="form-control" value="{{$user->cin}}" placeholder="Enter your cin">
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="text-right">
            <button class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                {{ __('Update') }}
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
