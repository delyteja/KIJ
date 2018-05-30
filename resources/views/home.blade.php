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
                        <h3 style="text-align: center;">Rp {{ Auth::User()->total }} ,00</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="text-align: center;">Pemasukan</h3>
                        <div class="panel-body">
                            <div id="morris-bar-pemasukan"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="text-align: center;">Pengeluaran</h3>
                        <div class="panel-body">
                            <div id="morris-bar-pengeluaran"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="panel-body">
                            <div id="morris-donut-pemasukan"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="panel-body">
                            <div id="morris-donut-pengeluaran"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="text-align: center;">Keterangan</h3>
                        <ul>
                            @foreach($k_masuk as $one)
                                <li>{{ $one->id }} : {{ $one->nama_kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="text-align: center;">Keterangan</h3>
                        <ul>
                            @foreach($k_keluar as $one)
                                <li>{{ $one->id }} : {{ $one->nama_kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('new_js')
    
        @include('include.morris')
    
@endsection
