<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Pemasukan;
use App\User;
use App\Kategori_Pemasukan;
use Auth;

class PemasukanController extends Controller
{
    public function create()
    {
    	return view('pemasukan.create');
    }
    public function store(Request $request)
    {  //dd($request->nama_transaksi);   
    	$p = new Pemasukan;
    	$p->user_id = Auth::User()->id;
    	$p->date_created = $request->tanggal;
    	$p->time_created = $request->waktu;

    	$q = Kategori_Pemasukan::findOrFail($request->nama_transaksi);
    	$p->nama_transaksi = $q->nama_kategori;
    	$p->jumlah = $request->jumlah;
    	$p->kategori_id = $request->nama_transaksi;
    	$p->lokasi = $request->lokasi;
    	if (Input::hasFile('bukti_transaksi') ) 
            {  
                $pic = Input::file('bukti_transaksi');
                $p->nama_bukti = time() . '.' .$pic->getClientOriginalName();       
                Image::make($pic)->resize(300,300)->save(public_path('/Bukti/'.$p->nama_bukti));
            }
         $p->save();

         $user = User::findOrFail(Auth::User()->id);
         $user->total += $request->jumlah;
         $user->save();
    }
    public function gaji_pokok()
    {
    	$pemasukan = Pemasukan::where('kategori_id','1')->get();
    	$p = Pemasukan::where('kategori_id','1')->first();
    	$judul = $p->nama_transaksi;
    	
    	return view('pemasukan.pemasukan_rutin.gaji_pokok',compact('pemasukan','judul'));
    }
}


// 'user_id', 'date_created', 'time_created','nama_transaksi','jumlah','kategori_id','nama_bukti','lokasi',
