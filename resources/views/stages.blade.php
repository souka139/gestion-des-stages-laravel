@extends('template')
@section('titre')
    stage details
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 text-gray-900 mb-4">Mon stage</h1>
</div>
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

@if (Session::get('oui'))
  <div class="alert alert-success">
    {{Session::get('oui')}}
  </div>
@endif
@if (Session::get('non'))
<div class="alert alert-danger">
  {{Session::get('non')}}
</div>
@endif

@foreach ($stages as $stage)
    @if (Auth::user()->id == $stage->student_id)
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mb-2 text-primary">Entreprise</h6>
              </div>
              @foreach ($entreprises as $entrep)
                  @if ($entrep->id==$stage->entreprise_id)
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="fullName">nom entreprise</label>
                      <input type="text" class="form-control" value="{{$entrep->nom_entreprise}}" disabled>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="eMail">adress</label>
                      <input type="text" class="form-control" value="{{$entrep->adress_entreprise}}" disabled>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="phone">phone</label>
                      <input type="text" class="form-control" value="{{$entrep->tel_entreprise}}" disabled>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label>ville</label>
                        <input type="text" class="form-control" value="{{$entrep->ville_entreprise}}" disabled>
                      </div>
                  </div>
                  @endif
              @endforeach
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mt-3 mb-2 text-primary">Encadrant informations</h6>
                </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>nom encadrant</label>
                    <input type="text" class="form-control" value="{{$stage->nom_encadrant}}" disabled>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="pic">prenom encadrant</label>
                    <input type="text" class="form-control" value="{{$stage->prenom_encadrant}}" disabled>
                  </div>
                </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2 text-primary">projet informations</h6>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>sujet</label>
                  <input type="text" value="{{$stage->sujet_titre}}" class="form-control" disabled>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>description</label>
                  <textarea type="text" class="form-control" disabled>{{$stage->sujet_description}}</textarea>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>technologies</label>
                  <input type="text" name="technologies" value="{{$stage->technologies}}" disabled class="form-control">
                </div>
              </div>
            </div>
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mt-3 mb-2 text-primary">student informations</h6>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>stagier nom</label>
                  <input type="text" name="student1_nom" value="{{Auth::user()->lastName}}" disabled class="form-control">
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>stagier prenom</label>
                  <input type="text" name="student1_prenom" value="{{Auth::user()->firstName}}" disabled class="form-control" >
                </div>
              </div>
            </div>
            @if ($stage->student2_nom)
              <div class="row gutters" id="binaume-div">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>partenaire nom</label>
                    <input type="text" value="{{$stage->student2_nom}}" disabled class="form-control" >
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>partenaire prenom</label>
                    <input type="text"  value="{{$stage->student2_prenom}}" disabled class="form-control">
                  </div>
                </div>
              </div> 
            @endif
            
            <?php $exist=false ?>
           @foreach ($fichiers as $fichier)
               @if (Auth::user()->id==$fichier->student_id)
               <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mt-3 mb-2 text-primary">Mes fichiers</h6>
                </div>
                @if ($fichier->rapport_prv !=null)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>la première version du rapport</label>
                   <small><a href="/storage/fichiers/{{$fichier->rapport_prv}}">{{$fichier->rapport_prv}}</a></small>
                  </div>
                </div>
                @endif
                @if ($fichier->rapport_crv != null)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>la version corrigée du rapport</label>
                    <small><a href="/storage/fichiers/{{$fichier->rapport_crv}}">{{$fichier->rapport_crv}}</a></small>
                  </div>
                </div>
                @endif
                @if ($fichier->presentation != null)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label> la présentation</label>
                    <small><a href="/storage/fichiers/{{$fichier->presentation}}">{{$fichier->presentation}}</a></small>
                  </div>
                </div>
                @endif
                @if ($fichier->attestation != null)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>l’attestation de stage</label>
                    <small><a href="/storage/fichiers/{{$fichier->attestation}}">{{$fichier->attestation}}</a></small>
                  </div>
                </div>
                @endif
                @if ($fichier->fiche_ev != null)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>la fiche d’évaluation</label>
                   <small><a href="/storage/fichiers/{{$fichier->fiche_ev}}">{{$fichier->fiche_ev}}</a></small> 
                  </div>
                </div>
                @endif
              </div> 
              <a class="btn btn-primary btn-sm" href="{{route('fichier.edit',$fichier->id)}}">Mettre a jour les fichiers</a>
                 <?php $exist=true?>
              @endif
            @endforeach

            @if ($exist==false)
            <div class="row gutters">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <label class="text-dark mt-4"><a href="{{route('fichier.create')}}">Clickez ici</a> pour déposez les fichiers</label>
              </div>
            </div> 
            @endif
          </div>
        </div>
      </div>
        </div>
      </div>
      </form>
      
    @endif
@endforeach
@endsection
