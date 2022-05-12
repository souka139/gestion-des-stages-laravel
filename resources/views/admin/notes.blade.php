@extends('template')
@section('titre')
    les notes
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
    <h1 class="h3 mb-0 text-gray-800">les notes attribués aux étudiants</h1>
    <form action="{{route('etudiant.exportToExcel')}}" method="get">    
      <button class="d-sm-inline-block btn btn-sm btn-success shadow-sm" type="submit"><i
        class="fas fa-download fa-sm text-white-50"></i> Exporter les résultats </button>
    </form>
</div>

<!-- Content Row -->

<div class="card">
    <table class="table table-sm">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">student nom</th>
            <th scope="col">student prenom</th>
            <th scope="col">soutenance</th>
            <th scope="col">note</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($stages as $stage)
            @foreach ($encadrants as $enc)
                @if ($stage->id==$enc->stage_id)
                    @if ($enc->soutenance=='valide')
                    <tr>
                        <th><small><strong>{{$stage->id}}</strong></small></th>
                        <td><small>{{$stage->student1_nom}}</small></td>
                        <td><small>{{$stage->student1_prenom}}</small></td>
                        <td><small><span class="valide success">{{$enc->soutenance}}</span></small></td>
                        <td><small>{{$enc->note}}</small></td>
                    </tr>
                    @endif
                @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
</div>

<!-- /.container-fluid --> 
@endsection


            