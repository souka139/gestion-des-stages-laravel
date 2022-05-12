@extends('template')
@section('titre')
    stages
@endsection
<?php 
use App\Models\entreprise;
use App\Models\stage;

$stages=stage::paginate(10);
$entreprises=entreprise::all();
?>
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Stages</h1>
</div>

<!-- Content Row -->

<div class="card">
  <div class="table-responsive">
    <table class="table table-sm">
        <thead class="table-light">
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
                <th><small><strong>{{$stage->id}}</strong></small></th>
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
        </tbody>
      </table>
  </div>
      {{ $stages->links() }}
</div>

<!-- /.container-fluid --> 
@endsection


            