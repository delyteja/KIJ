@extends('layouts.main')

@section('action-content')
		<section class="content-header">
                <h1 style="text-align: center;"><b> Menambah Jenis Kategori</b></h1>
            </section>
            <div class="panel-body">
                <div class="panel panel-default" style="margin-bottom:290px;margin-top:75px;">
                    <div class="panel-body">
                        <form method="POST" action="{{ url('/tambah_kategori/store_jenis_kategori')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Pilih Tipe</label>
                                <div class="col-md-4">
                                <select class="form-control" name="role">
                                    <option value="1">Pemasukan</option>
                                    <option value="2">Pengeluaran</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nama_jenis') ? ' has-error' : '' }}">
                                <label for="nama_jenis" class="col-md-4 control-label">Nama Jenis Kategori</label>
                                <div class="col-md-4">
                                    <input id="nama_jenis" type="text" class="form-control" name="nama_jenis" required>
                                    @if ($errors->has('nama_jenis'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_jenis') }}</strong>
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

            @include('include.modal')

@endsection