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
        $jk_masuk = JenisKategori::where('role',1)->get();
        $jk_keluar = JenisKategori::where('role',2)->get();
        $nama_k_masuk = Kategori_Pemasukan::all();
        $nama_k_keluar = Kategori_Pengeluaran::all();
    	return view('kategori.create_jenis',compact('jk_masuk','jk_keluar','nama_k_masuk','nama_k_keluar'));
    }

    public function store_jenis(Request $request)
    {
    	$p = new JenisKategori ;
    	$p->role=$request->role;
    	$p->nama_jenis = $request->nama_jenis;
    	$p->save();
        return redirect()->action('HomeController@index'); 
    }
    public function create_nama_pemasukan()
    {   $jk_masuk = JenisKategori::where('role',1)->get();
        $jk_keluar = JenisKategori::where('role',2)->get();
        $nama_k_masuk = Kategori_Pemasukan::all();
        $nama_k_keluar = Kategori_Pengeluaran::all();

    	$jenis = JenisKategori::where('role',1)->get();
    	return view('kategori.create_nama_pemasukan',compact('jenis','jk_masuk','jk_keluar','nama_k_masuk','nama_k_keluar'));
    }
    public function store_nama_pemasukan(Request $request)
    {   
    	$p = new Kategori_Pemasukan;
    	$p->nama_kategori = $request->nama_kategori;
    	$p->jenis_kategori_id=$request->nama_jenis;
    	$p->save();
        return redirect()->action('HomeController@index');
    }
    public function create_nama_pengeluaran()
    {
        $jk_masuk = JenisKategori::where('role',1)->get();
        $jk_keluar = JenisKategori::where('role',2)->get();
        $nama_k_masuk = Kategori_Pemasukan::all();
        $nama_k_keluar = Kategori_Pengeluaran::all();

    	$jenis = JenisKategori::where('role',2)->get();
    	return view('kategori.create_nama_pengeluaran',compact('jenis','jk_masuk','jk_keluar','nama_k_masuk','nama_k_keluar'));
    }
    public function store_nama_pengeluaran(Request $request)
    {   
    	$p = new Kategori_Pengeluaran;
    	$p->nama_kategori = $request->nama_kategori;
    	$p->jenis_kategori_id=$request->nama_jenis;
    	$p->save();
        return redirect()->action('HomeController@index');
    }
}
