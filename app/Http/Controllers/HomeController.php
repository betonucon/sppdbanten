<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Riwayatsppd;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($bulan=null,$tahun=null)
    {
        $page="Dashboard";
        $ketpage="Data Pencarian Pegawai Bertugas";
        $url='/';
        $data=Pegawai::all();
        $cekdata=collect([]);
        foreach($data as $o){
            for($t=1;$t<=31;$t++){
                $tgl=$tahun.'-'.$bulan.'-'.$t;
                $cek=Riwayatsppd::where('tanggal',$tgl)->where('pegawai_id',$o->id)->count();
                $title=Riwayatsppd::where('tanggal',$tgl)->where('pegawai_id',$o->id)->first();
                if($cek>0){
                    $cekdata->push([
                        'ceek' => '<td title="NOMOR SURAT: '.ceksurattugas($title->surat_tugas_id).'" style="background:#9ce080;padding:1px"></td>'
                    ]);
                }else{
                    $cekdata->push([
                        'ceek' => '<td style="padding:1px"></td>'
                    ]);
                }
                
            }
        }
       
         return view( 'welcome',compact('page','ketpage','url','data','cekdata'));
    }
}
