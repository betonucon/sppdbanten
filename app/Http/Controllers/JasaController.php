<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Jasaperjalanan;
use PDF;

class JasaController extends Controller
{
    public function index($notif=null){
        $page="Daftar Jasa Perjalanan";
        $ketpage="Daftar Jasa Perjalanan";
        $url='jasa/';
        $bidang=Jasaperjalanan::all();
        $modalbidang=Jasaperjalanan::all();
        $alert=Jasaperjalanan::all();
        $notif=$notif;
        return view( 'jasa.index',compact('page','ketpage','url','bidang','notif','modalbidang','alert'));
    }

    public function store(request $request, $act){
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Jasa Harus diisi';}
        if (trim($request->keterangan) == '') {$error[] = '-  Kolom Deskripsi Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas               = new Jasaperjalanan;
                $datas->name         = $request->name;
                $datas->icon_gambar  = $request->icon_gambar;
                $datas->keterangan   = $request->keterangan;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas               = Jasaperjalanan::find($request->id);
                $datas->name         = $request->name;
                $datas->icon_gambar  = $request->icon_gambar;
                $datas->keterangan   = $request->keterangan;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Jasaperjalanan::all();
 
    	$pdf = PDF::loadview('pdf.jasa',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Jasaperjalanan::all();
 
    	$pdf = PDF::loadview('pdf.jasa',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Jasaperjalanan::where('id',$id)->delete();
 
    }
}
