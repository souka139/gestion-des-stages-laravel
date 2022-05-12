@extends('template')
@section('titre')
    Teachers panel
@endsection

@section('content')
<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Teachers Dashboard</h1>
</div> --}}

<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    main h1{
        font-size: 50px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
    }
    .dd{
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
    max-width: 42em;
    }

    .bg{
        background: linear-gradient(rgba(0, 0, 0, 0.384),rgba(0, 0, 0, 0.384)) ,url(https://www.uit.ac.ma/wp-content/uploads/2019/12/conf-ensa1-op.jpg);
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

  </style>
@section('content')
<!-- Page Heading -->

<div class="d-flex dd h-100 text-center text-white bg">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto justify-content-center align-items-center">
      
        <main class="pb-5">
          <h1>Welcome {{Auth::user()->firstName}}</h1>
        </main>
      
      </div>

</div>
  

<!-- /.container-fluid --> 
@endsection


            