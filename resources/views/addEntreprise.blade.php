@extends('template')
@section('titre')
    Ajouter une entreprise
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4">Ajouter une entreprise</h1>
</div>
<!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
<form class="user" method="POST" action="{{ route('entreprise.store') }}">
@csrf

<div class="container">
  <div class="row gutters">
  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Entreprise informations</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="fullName">nom entreprise <span class="etoile">*</span></label>
            <input type="text" class="form-control" name="nom_entreprise">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="eMail">adress <span class="etoile">*</span></label>
            <input type="text" class="form-control" name="adress_entreprise">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="phone">phone <span class="etoile">*</span></label>
            <input type="text" class="form-control" name="tel_entreprise">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label>ville <span class="etoile">*</span></label>
              <input type="text" class="form-control" name="ville_entreprise">
            </div>
        </div>
      </div>

      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="text-right">
            <button class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                {{ __('add') }}
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
