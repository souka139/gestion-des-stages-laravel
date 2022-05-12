@extends('template')
@section('titre')
    create new user
@endsection
@section('content')
<div class="card o-hidden border-0 shadow-sm my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-8">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Create new user</h1>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form class="user" method="POST" action="{{ route('user.store') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="firstName" class="form-control" placeholder="First name" type="text" name="firstName" value="{{old('first name')}}" required autofocus />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="lastName" class="form-control" placeholder="Last name" type="text" name="lastName" value="{{old('last name')}}" required autofocus />
                              </div>  
                            </div>
                                <div class="form-group">
                                    <input id="email" placeholder="Email" class="form-control" type="email" name="email" value="{{old('email')}}"  required />
                                </div>
                            
                            <div class="form-group">
                                <input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        placeholder="password"
                                        required autocomplete="new-password" />
                            </div>    
                            
                            <div class="form-group">
                                {{-- select option role type --}}
                                <div class="mb-3 mb-sm-0">
                                    <select name="roles[]" class="form-control">
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <br>
                            <button class="btn btn-success btn-sm mt-3">
                                {{ __('Register') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection
