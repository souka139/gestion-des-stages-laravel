@extends('template')
@section('titre')
étudiants par enseignant
@endsection
<?php 
use App\Models\entreprise;
use App\Models\stage;
use App\Models\encadrant;

$encadrants=encadrant::all();
?>
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">La liste des étudiants par enseignant</h1>
</div>

<!-- Content Row -->

<form action="{{route('etudiant.search')}}" method="GET">
  <div class="row">
    <div class="col-md-6">
      <label>Enseignant nom</label>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <select name="query" class="form-control w-12">
          @foreach ($encadrants as $encadrant)
          <option value="{{$encadrant->stage_id}}">{{$encadrant->nom_encadrant}}</option>
          @endforeach
      </select>
      <button type="submit" class="btn btn-primary btn-sm mx-4">search</button>
      </div>
    </div>
  </div>
  </form>

<br>
@if (isset($stages))
<div class="card">
  <div class="table-responsive">
    <table class="table table-sm">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">student nom</th>
            <th scope="col">student prenom</th>
          </tr>
        </thead>
        <tbody>
          @if (count($stages)>0)
              @foreach ($stages as $stage)
              <tr>
                <td><small>{{$stage->id}}</small></td>
                <td><small>{{$stage->student1_nom}}</small></td>
                <td><small>{{$stage->student1_prenom}}</small></td>
              </tr>
              @endforeach
          @else
          <tr><td>No result found</td></tr>
          @endif
        </tbody>
      </table>
  </div>
</div> 
@endif

<!-- /.container-fluid --> 
@endsection


            