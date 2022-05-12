@extends('template')
@section('titre')
note
@endsection
<?php 
use App\Models\encadrant;
$encadrants=encadrant::all();
?>
@section('content')
<div class="card o-hidden border-0 shadow-sm my-5 ">
    <div class="card-body mb-5 p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-6">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4"> Attribué une note finale</h1>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form class="user" method="POST" action="{{route('stages.note',$encadrant->id)}}">
                        @csrf
                            <div class="form-group">
                                <div class="mb-3 mb-sm-0">
                                    <label>Stage id</label>
                                   <select name="stage_id" class="form-control">
                                      <option  value="{{$encadrant->stage_id}}">{{$encadrant->stage_id}}</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 mb-sm-0">
                                    <label>la note</label>
                                   <input type="text" class="form-control" name="note" placeholder="donner la note finale">
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm mt-3">
                                {{ __('valider') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection
