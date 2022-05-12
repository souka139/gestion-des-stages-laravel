@extends('template')
@section('titre')
    edit user
@endsection
@section('content')
<div class="card o-hidden border-0 shadow-sm my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-8">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Edit user</h1>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form class="user" method="POST" action="{{ route('user.update',$user->id) }}">
         
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="firstName" class="form-control" placeholder="Enter the first name" type="text" name="firstName" value="{{$user->firstName}}"
                                    required autofocus />
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="lastName" class="form-control" placeholder="Enter the last name" type="text" name="lastName" value="{{$user->lastName}}"
                                    required autofocus />
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="email" placeholder="Enter your email" class="form-control" type="email" name="email" value="{{$user->email}}"
                            required />
                        </div>
                        
                        <div class="form-group">
                            {{-- select option role type --}}
                            <div class="mb-3 mb-sm-0">
                                <select name="roles[]" class="form-control">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}"  @isset($user)
                                        @if (in_array($role->id,$user->roles->pluck('id')->toArray()))
                                            selected
                                        @endif
                                    @endisset>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <br>
                        <button class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection
