@extends('template')
@section('titre')
    ajouter les fichiers
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4">Déposez les fichiers</h1>
</div>
<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
<form class="user" method="POST" action="{{ route('fichier.store') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mt-3 mb-2 text-primary">Mes fichier de stage</h6>
                </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Déposer la première version du rapport </label>
                    <input type="file" class="form-control" name="rapport_prv">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Déposer la version corrigée du rapport</label>
                    <input type="file" class="form-control" name="rapport_crv">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label> Déposer la présentation</label>
                    <input type="file" class="form-control" name="presentation">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label> Déposer l’attestation de stage</label>
                    <input type="file" class="form-control" name="attestation">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label> Déposer la fiche d’évaluation</label>
                    <input type="file" class="form-control" name="fiche_ev">
                  </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <button class="d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        {{ __('ajouter') }}
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
