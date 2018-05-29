@extends('include.app')

@section('judul')
Aplikasi Keuangan
@endsection

@section('content')
<header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">APLIKASI KEUANGAN</h1>
        <hr class="star-light">
        
        <div class="row">
          <div class="col-sm-5">
            <a class="btn btn-xl btn-outline-light pull-right" href="{{ route('login') }}">
                Login
            </a>
          </div>
          <div class="col-sm-2"></div>
          <div class="col-sm-5">
            <a class="btn btn-xl btn-outline-light pull-left" href="{{ route('register') }}">
                Register
            </a>
          </div>
        </div>
      </div>
    </header>
@endsection