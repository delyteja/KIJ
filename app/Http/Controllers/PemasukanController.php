<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Pemasukan;
use App\User;
use App\Kategori_Pemasukan;
use Auth;
use Excel;

class PemasukanController extends Controller
{
    public function create()
    {   $kategori = Kategori_Pemasukan::all();
    	return view('pemasukan.create',compact('kategori'));
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
         return redirect()->action('HomeController@index');
    }
    public function detail($id)
    {  
    	$pemasukan = Pemasukan::where('kategori_id',$id)->get();
    	$kategori = Kategori_Pemasukan::findOrFail($id);
    	
    	return view('pemasukan.detail',compact('pemasukan','kategori'));
    }
    public function delete($id)
    {
        $del = Pemasukan::findorfail($id);
        $id = $del->kategori_id;
        $del->delete();
        return redirect()->action('PemasukanController@detail',['id'=>$id])->with('sukses', 'Pemasukan Berhasil Dihapus');
    }

    public function excel($id)
    {
        setlocale(LC_ALL, 'IND');
        $pemasukan=Pemasukan::where('kategori_id',$id)->get(); 
        Excel::create('Daftar Pemasukan', function($excel) use ($pemasukan)
        {
                      $excel->setTitle('Daftar Pemasukan');
                      $excel->setCreator('Laravel-5.6')->setCompany('KIJ F');
                      $excel->sheet('Excel sheet', function($sheet) use ($pemasukan) 
                      {
                        $sheet->row(1, function ($row) 
                        {
                            $row->setFontFamily('Arial');
                            $row->setFontSize(15);
                            $row->setFontWeight('bold');
                        });
                          $sheet->mergeCells("A1".":E1");
                          $sheet->row(1, array('Daftar Pemasukan','','','',''));
                          $sheet->row(2, array('No','Tanggal','Waktu','Tempat Transaksi','jumlah'));
                           foreach ($pemasukan as $i => $rows) 
                          {
                              $sheet->row($i+3, array($i+1,strftime(" %d %b %Y", strtotime($rows->date_created)),$rows->time_created,$rows->lokasi,$rows->jumlah
                                ));
                         }
                            });
        })->store('xls', public_path('export\\'));

        $kategori = Kategori_Pemasukan::where('id', $id)->get();
        $kk = $kategori[0]->nama_kategori;

        return redirect()->action('PemasukanController@detail',$id)->with('sukses', 'Pemasukan ' .$kk. ' Berhasil Diekspor');
    }
}


