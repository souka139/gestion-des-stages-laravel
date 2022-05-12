@extends('template')
@section('titre')
Etudiants sans rapport
@endsection
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Etudiants sans rapport</h1>
</div>

<!-- Content Row -->

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
            @foreach ($stages as $stage)
                @foreach ($fichiers as $fich)
                    @if ($stage->student_id==$fich->student_id)
                        @if ($fich->rapport_prv==null)
                            <tr>
                                <td><small><strong>{{$stage->id}}</strong></small></td>
                                <td><small>{{$stage->student1_nom}}</small></td>
                                <td><small>{{$stage->student1_prenom}}</small></td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </tbody>
      </table>
  </div>
</div>

<!-- /.container-fluid --> 
@endsection


            