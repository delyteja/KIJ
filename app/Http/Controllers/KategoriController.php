<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKategori;
use App\Kategori_Pemasukan;
use App\Kategori_Pengeluaran;

class KategoriController extends Controller
{
    public function create_jenis()
    {
    	return view('kategori.create_jenis');
    }

    public function store_jenis(Request $request)
    {
    	$p = new JenisKategori ;
    	$p->role=$request->role;
    	$p->nama_jenis = $request->nama_jenis;
    	$p->save(); 
    }
    public function create_nama_pemasukan()
    {
    	$jenis = JenisKategori::where('role',1)->get();
    	return view('kategori.create_nama_pemasukan',compact('jenis'));
    }
    public function store_nama_pemasukan(Request $request)
    {   
    	$p = new Kategori_Pemasukan;
    	$p->nama_kategori = $request->nama_kategori;
    	$p->jenis_kategori_id=$request->nama_jenis;
    	$p->save();
    }
    public function create_nama_pengeluaran()
    {
    	$jenis = JenisKategori::where('role',2)->get();
    	return view('kategori.create_nama_pengeluaran',compact('jenis'));
    }
    public function store_nama_pengeluaran(Request $request)
    {   
    	$p = new Kategori_Pengeluaran;
    	$p->nama_kategori = $request->nama_kategori;
    	$p->jenis_kategori_id=$request->nama_jenis;
    	$p->save();
    }
}
