@extends('layouts.main')

@section('action-content')
<!-- 'user_id', 'date_created', 'time_created','nama_transaksi','jumlah','kategori_id','nama_bukti','lokasi',
 -->		<section class="content-header">
                <h1 style="text-align: center;"><b> Menambah Pemasukan</b></h1>
            </section>
            <div class="panel-body">
                <div class="panel panel-default" style="margin-bottom:290px;margin-top:75px;">
                    <div class="panel-body">
                        <form method="POST" action="{{ url('/pemasukan/store')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                <label for="tanggal" class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-4">
                                    <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                                    @if ($errors->has('tanggal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('waktu') ? ' has-error' : '' }}">
                                <label for="waktu" class="col-md-4 control-label">Waktu</label>
                                <div class="col-md-4">
                                    <input id="waktu" type="time" class="form-control" name="waktu" required>
                                    @if ($errors->has('waktu'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('waktu') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('jenis_transaksi') ? ' has-error' : '' }}">
                                <label for="jenis_transaksi" class="col-md-4 control-label">Jenis Transaksi</label>
                                <div class="col-md-4">
                                <select class="form-control" name="role">
                                    <option value="1">Pemasukan Rutin</option>
                                    <option value="2">Pemasukan Per 6 bulan</option>
                                    <option value="3">Pemasukan Tahunan</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nama_transaksi') ? ' has-error' : '' }}">
                                <label for="nama_transaksi" class="col-md-4 control-label">Nama Transaksi</label>
                                <div class="col-md-4">
                                <select class="form-control" name="nama_transaksi">
                                    <option value="1">Gaji Pokok</option>
                                    <option value="2">Gaji Tunjangan</option>
                                    <option value="3">Pembayaran Kos</option>
                                    <option value="4">Panen Padi</option>
                                    <option value="5">Panen Rempah-rempah</option>
                                    <option value="6">Pembayaran Sewa Rumah</option>
                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                                <label for="jumlah" class="col-md-4 control-label">Jumlah</label>
                                <div class="col-md-4">
                                    <input id="jumlah" type="number" class="form-control" name="jumlah" required>
                                    @if ($errors->has('jumlah'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlah') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                                <label for="lokasi" class="col-md-4 control-label">Lokasi</label>
                                <div class="col-md-6">
                                    <input id="lokasi" type="text" class="form-control" name="lokasi" required>
                                    @if ($errors->has('lokasi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lokasi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bukti_transaksi') ? ' has-error' : '' }}">
                                <label for="foto" class="col-md-4 control-label">Bukti Transaksi</label>
                                <div class="col-md-6">
                                    <input id="foto" type="file" class="form-control" name="bukti_transaksi" required>
                                    @if ($errors->has('bukti_transaksi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bukti_transaksi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="col-md-offset-4 col-md-4">
                                <input class="btn btn-primary" type="submit" value="{{'Simpan'}}">
                                <input class="btn btn-danger" type="reset" value="{{'Reset'}}">
                            </div>
                        </form>
                    </div>
               </div>
            </div>


@endsection