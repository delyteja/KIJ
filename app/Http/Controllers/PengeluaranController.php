<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Pengeluaran;
use App\User;
use App\Kategori_Pengeluaran;
use Auth;

class PengeluaranController extends Controller
{
    public function create() 
    {
    	$kategori_pengeluaran = Kategori_Pengeluaran::all();

    	return view ('pengeluaran.create', compact('kategori_pengeluaran'));
    }

    public function store(Request $request) 
    {	
    	$p = new Pengeluaran;

    	$p->user_id = Auth::User()->id;
    	$p->date_created = $request->tanggal;
    	$p->time_created = $request->waktu;

    	$q = Kategori_Pengeluaran::findOrFail($request->nama_transaksi);
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
         $user->total -= $request->jumlah;
         $user->save();

         return view('home');
    }

    public function histori($opsi)
    {   

    	$kategori = Kategori_Pengeluaran::where('nama_kategori', $opsi)->get();
    	$pengeluaran = Pengeluaran::where('kategori_id',$kategori[0]->id)->get();
    	// dd($opsi,$kategori,$pengeluaran);
        // dd($pemasukan);
    	// $p = Pengeluaran::where('kategori_id',$kategori[0]->id)->first();
        // $judul = $p->nama_transaksi;
    	
    	return view('pengeluaran.histori',compact('pengeluaran','judul'));
    }
}
