@extends('layouts.main')

@section('action-content')
		<section class="content-header">
                <h1 style="text-align: center;"><b> Menambah Nama Kategori Pengeluaran</b></h1>
            </section>
            <div class="panel-body">
                <div class="panel panel-default" style="margin-bottom:290px;margin-top:75px;">
                    <div class="panel-body">
                        <form method="POST" action="{{ url('/tambah_kategori/store_nama_kategori_pengeluaran')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group{{ $errors->has('jenis_kategori') ? ' has-error' : '' }}">
                                <label for="jenis_kategori" class="col-md-4 control-label">Pilih Jenis Kategori</label>
                                <div class="col-md-4">
                                <select class="form-control" name="nama_jenis">
                                    @foreach($jk_keluar as $j)
                                    <option value="{{$j->id}}">{{$j->nama_jenis}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nama_jenis') ? ' has-error' : '' }}">
                                <label for="nama_jenis" class="col-md-4 control-label">Nama Kategori Pemasukan</label>
                                <div class="col-md-4">
                                    <input id="nama_kategori" type="text" class="form-control" name="nama_kategori" required>
                                    @if ($errors->has('nama_kategori'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_kategori') }}</strong>
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