@extends('template')
@section('titre')
    Profile page
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mon Profile</h1>
    <a href="{{route('profile.edit',Auth::user()->id)}}" role="button" class="d-sm-inline-block btn btn-sm btn-success shadow-sm">Edit Profile</a>
</div>
@if (Session::get('yes'))
  <div class="alert alert-success">
    {{Session::get('yes')}}
  </div>
@endif
@if (Session::get('no'))
<div class="alert alert-danger">
  {{Session::get('non')}}
</div>
@endif

{{-- ****************** --}}
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
                <input type="text" class="form-control" disabled id="eMail" value="{{Auth::user()->lastName}}">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="fullName">prenom</label>
                <input type="text" class="form-control" disabled id="fullName" value="{{Auth::user()->firstName}}">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="phone">Email</label>
                <input type="email" class="form-control" disabled value="{{Auth::user()->email}}">
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
                    <input type="tel" name="phone" disabled class="form-control" value="{{Auth::user()->phone}}">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Adress</label>
                    <input type="text" name="adress" disabled class="form-control" value="{{Auth::user()->adress}}">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>CIN</label>
                    <input type="text" name="cin" disabled class="form-control" value="{{Auth::user()->cin}}">
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- /.container-fluid --> 
@endsection


            