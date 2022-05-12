@extends('template')
@section('titre')
    tous les stages
@endsection
<?php 
use App\Models\entreprise;
use App\Models\stage;
use App\Models\encadrant;

$stages=stage::paginate(10);
$entreprises=entreprise::all();
$encadrants=encadrant::all();
?>
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Stages</h1>
    <a href="{{route('stages.create')}}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm"> Choisir les stages à encadrer</a>
</div>
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

<!-- Content Row -->

<div class="card">
  <div class="table-responsive">
    <table class="table">
        <thead style="background-color: rgba(182, 222, 248, 0.596); color: black">
          <tr>
            <th scope="col" class="text-center ">#</th>
            <th scope="col" class="text-center ">student nom</th>
            <th scope="col" class="text-center ">student prenom</th>
            <th scope="col" class="text-center ">entreprise nom</th>
            <th scope="col" class="text-center ">nom encadrant</th>
            <th scope="col" class="text-center ">prenom encadrant</th>
            <th scope="col" class="text-center ">project &nbsp;sujet</th>
            <th scope="col" class="text-center ">project description</th>
            <th scope="col" class="text-center ">technologies utilisés</th>
            <th scope="col" class="text-center ">partenaire nom</th>
            <th scope="col" class="text-center ">paretenaire prenom</th>
            {{-- <th scope="col">Actions</th> --}}
          </tr>
        </thead>
        <tbody>
          
            @foreach ($stages as $stage)
            <tr>
                <td><small>{{$stage->id}}</small></td>
                <td><small>{{$stage->student1_nom}}</small></td>
                <td><small>{{$stage->student1_prenom}}</small></td>
                @foreach ($entreprises as $entrep)
                    @if ($entrep->id==$stage->entreprise_id)
                        <td><small>{{$entrep->nom_entreprise}}</small></td>
                    @endif
                @endforeach
                <td><small>{{$stage->nom_encadrant}}</small></td>
                <td><small>{{$stage->prenom_encadrant}}</small></td>
                <td><small>{{$stage->sujet_titre}}</small></td>
                <td><small>{{$stage->sujet_description}}</small></td>
                <td><small>{{$stage->technologies}}</small></td>
                <td><small>{{$stage->student2_nom}}</small></td>
                <td><small>{{$stage->student2_prenom}}</small></td>
              </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
  </div>
      {{ $stages->links() }}
</div>
@foreach ($encadrants as $encad)
@if ($encad->nom_encadrant==Auth::user()->lastName)

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <label class="py-3">List des stages de l'enseignant : {{Auth::user()->firstName}} {{Auth::user()->lastName}}</label>
</div>
<div class="card">
  <div class="table-responsive">
    <table class="table">
        <thead style="background-color: rgba(182, 222, 248, 0.596); color: black">
          <tr>
            <th scope="col">#</th>
            <th scope="col">nom encadrant</th>
            <th scope="col">prenom encadrant</th>
            <th scope="col">soutenance</th>
            <th scope="col">stage id</th>
            <th scope="col">note finale</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
            <tr>
              <td><small>{{$encad->id}}</small></td>
              <td><small>{{$encad->nom_encadrant}}</small></td>
              <td><small>{{$encad->prenom_encadrant}}</small></td>
               @if ($encad->soutenance=="non valide")
               <td><span class="valide danger">{{$encad->soutenance}}</span></td>
               @else
               <td><span class="valide success">{{$encad->soutenance}}</span></td>
               @endif
              <td><small>{{$encad->stage_id}}</small></td>
              <td><small>{{$encad->note}}</small></td>
              <td><small>
               <a type="button" href="{{route('stages.validerpage',$encad->id)}}" class="btn btn-success btn-sm">valider</a>
               <a type="button" href="{{route('stages.notepage',$encad->id)}}" class="btn btn-warning btn-sm">note</a>
              </small></td>
            </tr>  
          <tr>
        </tbody>
      </table>
  </div>
      {{ $stages->links() }}
</div>

@endif
           
@endforeach

<!-- /.container-fluid --> 
@endsection


  
            