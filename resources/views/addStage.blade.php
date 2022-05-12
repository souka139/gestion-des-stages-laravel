@extends('template')
@section('titre')
    ajouter une stage
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4"> Ajouter une stage</h1>
</div>
<!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
<form class="user" method="POST" action="{{ route('stage.store') }}">
@csrf

<div class="container">
  <div class="row gutters">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="card h-100">
    <div class="card-body">
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-2 text-primary">Entreprise</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label>nom <span class="etoile">*</span></label>
              <select name="entreprise_id" class="form-control">
                <option value="" selected>------</option>
                  @foreach ($entreprises as $entrep)
                  <option value="{{$entrep->id}}">{{$entrep->nom_entreprise}}</option>
                  @endforeach
              </select>
              <br>
              <p>si l'entreprise n'existe pas , <a href="{{route('entreprise.create')}}">ajouter une entreprise</a></p>
            </div>
          </div>
        {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <input type="text" class="form-control" name="student_id" value="{{Auth::user()->id}}">
        </div> --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mt-3 mb-2 text-primary">Encadrant informations</h6>
          </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label>nom encadrant <span class="etoile">*</span></label>
              <input type="text" class="form-control" name="nom_encadrant" >
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="pic">prenom encadrant <span class="etoile">*</span></label>
              <input type="text" class="form-control" name="prenom_encadrant">
            </div>
          </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mt-3 mb-2 text-primary">projet informations</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>sujet <span class="etoile">*</span></label>
            <input type="text" name="sujet_titre" class="form-control">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>description <span class="etoile">*</span></label>
            <textarea type="text" name="sujet_description" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>technologies <span class="etoile">*</span></label>
            <input type="text" name="technologies" class="form-control">
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mt-3 mb-2 text-primary">student informations</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>stagier nom <span class="etoile">*</span></label>
            <input type="text" name="student1_nom" value="{{Auth::user()->lastName}}" disabled class="form-control">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>stagier prenom <span class="etoile">*</span></label>
            <input type="text" name="student1_prenom" value="{{Auth::user()->firstName}}" disabled class="form-control" >
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <p><small> le stage est en binaume ?</small> oui <input type="radio" name="binaume" id="show">
                    non <input type="radio" name="binaume" id="hide"></p>
            </div>
        </div>
      </div>
      <div class="row gutters" id="binaume-div" style="display: none">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>partenaire nom <span class="etoile">*</span></label>
            <input type="text" name="student2_nom" class="form-control" >
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label>partenaire prenom <span class="etoile">*</span></label>
            <input type="text" name="student2_prenom" class="form-control">
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="text-right">
            <button class="d-sm-inline-block btn btn-sm btn-success shadow-sm">
                {{ __('Add stage') }}
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

<script>
     
    document.getElementById("show").onclick = function() {
    document.getElementById("binaume-div").style.display = "flex";
}

document.getElementById("hide").onclick = function() {
    document.getElementById("binaume-div").style.display = "none";
    }
 
</script>
@endsection
