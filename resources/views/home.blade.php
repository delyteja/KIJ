@extends('layouts.main')

@section('action-content')
    <section class="content-header">
        <h1 style="text-align: center;"><b>Informasi Saldo</b></h1>
    </section>
    <div class="panel-body">
        <div class="panel panel-default" style="margin-bottom:290px;margin-top:75px;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 style="text-align: center;">Saldo Saat Ini</h3>
                        <h3 style="text-align: center;">Rp. {{ Auth::User()->total }} ,00</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
