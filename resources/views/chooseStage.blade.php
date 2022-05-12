@extends('template')
@section('titre')
Choisir les stages à encadrer
@endsection
@section('content')
<div class="card o-hidden border-0 shadow-sm my-5 ">
    <div class="card-body mb-5 p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-6">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Choisir les stages à encadrer</h1>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
                    <form class="user" method="POST" action="{{ route('stages.store') }}">
                        @csrf
                                                        
                            <div class="form-group">
                                {{-- select option role type --}}
                                <div class="mb-3 mb-sm-0">
                                    <label>Stage id</label>
                                    <select name="stage_id" class="form-control">
                                        @foreach ($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
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
