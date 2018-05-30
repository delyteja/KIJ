<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Pengeluaran;
use App\User;
use App\Kategori_Pengeluaran;
use Auth;
use Excel;

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

         return redirect()->action('HomeController@index');
    }

    public function histori($opsi)
    {
    	$kategori = Kategori_Pengeluaran::where('nama_kategori', $opsi)->get();
    	$pengeluaran = Pengeluaran::where('user_id',Auth::user()->id)->where('kategori_id',$kategori[0]->id)->get();
      $opsi = Kategori_Pengeluaran::findOrFail($kategori[0]->id);
    	return view('pengeluaran.histori',compact('pengeluaran','opsi'));
    }

    public function excel($id)
    {
        setlocale(LC_ALL, 'IND');
        $pengeluaran = Pengeluaran::where('kategori_id',$id)->get(); 
        Excel::create('Daftar Pengeluaran', function($excel) use ($pengeluaran)
        {
                      $excel->setTitle('Daftar Pengeluaran');
                      $excel->setCreator('Laravel-5.6')->setCompany('KIJ F');
                      $excel->sheet('Excel sheet', function($sheet) use ($pengeluaran) 
                      {
                        $sheet->row(1, function ($row) 
                        {
                            $row->setFontFamily('Arial');
                            $row->setFontSize(15);
                            $row->setFontWeight('bold');
                        });
                          $sheet->mergeCells("A1".":E1");
                          $sheet->row(1, array('Daftar Pengeluaran','','','',''));
                          $sheet->row(2, array('No','Tanggal','Waktu','Tempat Transaksi','jumlah'));
                           foreach ($pengeluaran as $i => $rows) 
                          {
                              $sheet->row($i+3, array($i+1,strftime(" %d %b %Y", strtotime($rows->date_created)),$rows->time_created,$rows->lokasi,$rows->jumlah
                                ));
                         }

                      });
        })->store('xls', public_path('export\\'));

    }

    public function delete($id)
    {
        $kategori = Kategori_Pengeluaran::where('nama_kategori', $id)->get();
        $del = Pengeluaran::where('kategori_id', $kategori[0]->id)->delete();
        return redirect()->action('PengeluaranController@histori',$id)->with('sukses', 'Pengeluaran Berhasil Dihapus');
    }
}
