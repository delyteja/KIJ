@extends('layouts.app-template')
@section('content')

  <div class="content-wrapper">
@if (session()->has('sukses'))
            <div class="container">
                <div class="alert alert-success col-md-11">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('sukses') }}
                </div>
            </div>
    @endif

    @if (session()->has('gagal'))
            <div class="container">
                <div class="alert alert-danger  col-md-11">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('gagal') }}
                </div>
            </div>
    @endif


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection