<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\Pemasukan;
use App\Kategori_Pemasukan;
use App\Kategori_Pengeluaran;
use App\User;
use App\JenisKategori;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::where('user_id', Auth::user()->id)->get();
        $pemasukan = Pemasukan::where('user_id', Auth::user()->id)->get();
        $k_masuk = Kategori_Pemasukan::all();
        $k_keluar = Kategori_Pengeluaran::all();

        $pengeluaran_chart = DB::table('pengeluaran')->select(DB::raw('sum(jumlah) as total_per_bulan, YEAR(date_created) as year, MONTH(date_created) as month'))->where('user_id', Auth::user()->id)->groupBy('year','month')->get()->toArray();

        $pengeluaran_chart_fix = '';
        foreach ($pengeluaran_chart as $one)
        {
            // $chart_test .= "{ total_per_bulan: ".$one['total_per_bulan'].", month: ".$one['month'].", year: ".$one['year']." }, ";
            $pengeluaran_chart_fix .= "{ x: ".$one->total_per_bulan.", m: '".$one->month."-".$one->year."' },";
        }
        $pengeluaran_chart_fix = substr($pengeluaran_chart_fix, 0, -1);
        // dd($pengeluaran_chart_fix);

        $pemasukan_chart = DB::table('pemasukan')->select(DB::raw('sum(jumlah) as total_per_bulan, YEAR(date_created) as year, MONTH(date_created) as month'))->where('user_id', Auth::user()->id)->groupBy('year','month')->get()->toArray();
        // $pemasukan_chart_encode = json_encode($pemasukan_chart);
        
        $pemasukan_chart_fix = '';
        foreach ($pemasukan_chart as $one)
        {
            // $chart_test .= "{ total_per_bulan: ".$one['total_per_bulan'].", month: ".$one['month'].", year: ".$one['year']." }, ";
            $pemasukan_chart_fix .= "{ x: ".$one->total_per_bulan.", m: '".$one->month."-".$one->year."' },";
        }
        $pemasukan_chart_fix = substr($pemasukan_chart_fix, 0, -1);
        // dd($chart_test);

        $pengeluaran_pie = DB::table('pengeluaran')->select(DB::raw('sum(jumlah) as total_per_kategori, kategori_id'))->where('user_id', Auth::user()->id)->groupBy('kategori_id')->get()->toArray();

        $pengeluaran_pie_fix = '';
        foreach ($pengeluaran_pie as $one)
        {
            // $chart_test .= "{ total_per_bulan: ".$one['total_per_bulan'].", month: ".$one['month'].", year: ".$one['year']." }, ";
            $pengeluaran_pie_fix .= "{ label: ".$one->kategori_id.", value: ".$one->total_per_kategori." },";
        }
        $pengeluaran_pie_fix = substr($pengeluaran_pie_fix, 0, -1);

        $pemasukan_pie = DB::table('pemasukan')->select(DB::raw('sum(jumlah) as total_per_kategori, kategori_id'))->where('user_id', Auth::user()->id)->groupBy('kategori_id')->get()->toArray();

        $pemasukan_pie_fix = '';
        foreach ($pemasukan_pie as $one)
        {
            // $chart_test .= "{ total_per_bulan: ".$one['total_per_bulan'].", month: ".$one['month'].", year: ".$one['year']." }, ";
            $pemasukan_pie_fix .= "{ label: ".$one->kategori_id.", value: ".$one->total_per_kategori." },";
        }
        $pemasukan_pie_fix = substr($pemasukan_pie_fix, 0, -1);

        // dd($pemasukan_chart_fix, $pengeluaran_chart_fix, $pemasukan_pie_fix, $pengeluaran_pie_fix);
        $jk_masuk = JenisKategori::where('role',1)->get();
        $jk_keluar = JenisKategori::where('role',2)->get();
        $nama_k_masuk = Kategori_Pemasukan::all();
        $nama_k_keluar = Kategori_Pengeluaran::all();
        // dd($nama_k_masuk,$nama_k_keluar);
        return view('home', compact('pengeluaran_chart_fix','pemasukan_chart_fix', 'pengeluaran_pie_fix', 'pemasukan_pie_fix', 'k_masuk', 'k_keluar','jk_masuk','jk_keluar','nama_k_masuk','nama_k_keluar'));
    }

    public function validasi()
    {
        $jk_masuk = JenisKategori::where('role',1)->get();
        $jk_keluar = JenisKategori::where('role',2)->get();
        $nama_k_masuk = Kategori_Pemasukan::all();
        $nama_k_keluar = Kategori_Pengeluaran::all();   
        return view('validasi',compact('nama_k_masuk', 'nama_k_keluar','jk_masuk','jk_keluar'));
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
} 