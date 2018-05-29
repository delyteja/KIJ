@extends('layouts.main')

@section('action-content')
<div class="panel panel-default">
<div class="panel-body" >
  <h4><i class="fa fa-university"></i> Pengeluaran {{$judul}}</h4><hr>
    <div class=row>
        <div class="col-md-6">
            <a href="{{ route('tambah_pengeluaran') }}" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> Tambah Pengeluaran</a>
        </div>
      <div class="col-md-2">
      </div>
        <div class="col-md-4"></div>
    </div>
<br>

<div class="table-responsive">
<table class="table table-bordered table-striped 
                  table-hover table-condensed tfix">
    <thead align="center">
      <tr>
        <td><b>No</b></td>
        <td><b>Tanggal</b></td>
        <td><b>Waktu</b></td>
        <td><b>Tempat Transaksi</b></td>
        <td><b>Bukti Transaksi</b></td>
        <td colspan="2"><b>Aksi</b></td>
      </tr>
    </thead>
    <?php setlocale(LC_ALL, 'IND');?>
    @foreach($pengeluaran as $p)
    <tr>
        <td>{{$loop->iteration or $p->id}}</td>
        <td>{{strftime(" %d %b %Y", strtotime($p->date_created))}}</td>
        <td>{{$p->time_created}}</td>
        <td>{{$p->lokasi}}</td>
        <td><img src="/Bukti/{{ $p->nama_bukti }}" style="width: 150px; height: 150px;"> </td>        
        <td align="center" width="30px">
          <a href="{{ url('/pemasukan/edit/'.$p->id ) }}" class="btn btn-warning btn-sm" 
          role="button"><i class="fa fa-pencil-square"></i> Edit</a>
        </td>
        <td align="center" width="30px">
          <a href="{{ url('/pemasukan/delete/'.$p->id ) }}" class="btn btn-sm btn-danger delete-btn" 
          role="button"><i class="fa fa-times-circle"></i> delete</a>
        </td>        
    </tr>
    @endforeach
</table>

</div>
</div>
</div>




@endsection