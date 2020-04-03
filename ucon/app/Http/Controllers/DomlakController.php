<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Domlak;
use PDF;

class DomlakController extends Controller
{
    public function index($notif=null){
        if(route_ssh(Auth::user()->role_id)>0){
            $page="SSH";
            $ketpage="Daftar SSH";
            $url='domlak/';
            $domlak=Domlak::all();
            $modaldomlak=Domlak::all();
            $alert=Domlak::all();
            $notif=$notif;
            return view( 'domlak.index',compact('page','ketpage','url','domlak','notif','modaldomlak','alert'));
        }else{
            $page="Error Not Found 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function tujuan($id){
        foreach(pilih_tujuan_sppd($id) as $tujuan){
            echo' <option value="'.$tujuan->id.'">'.$tujuan->name.'</option>';
        }
       
    }
    
    public function store(request $request, $act){
        if (trim($request->jenis_sppd_id) == '') {$error[] = '-  Pilih Jenis SPPD';}
        if (trim($request->golongan_id) == '') {$error[] = '-  Pilih Golongan';}
        if (trim($request->angkutan_id) == '') {$error[] = '-  Pilih Angkutan Yang dipergunakan';}
        if (trim($request->tujuan_sppd_id) == '') {$error[] = '-  Pilih Tujuan SPPD';}
        if (trim($request->transportasi) == '') {$error[] = '-  Kolom Transportasi Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas                      = new Domlak;
                $datas->jenis_sppd_id       = $request->jenis_sppd_id;
                $datas->golongan_id         = $request->golongan_id;
                $datas->angkutan_id         = $request->angkutan_id;
                $datas->tujuan_sppd_id      = $request->tujuan_sppd_id;
                $datas->transportasi        = $request->transportasi;
                $datas->uang_harian         = $request->uang_harian;
                $datas->uang_representasi   = $request->uang_representasi;
                $datas->uang_penginapan     = $request->uang_penginapan;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas                      = Domlak::find($request->id);
                $datas->jenis_sppd_id       = $request->jenis_sppd_id;
                $datas->golongan_id         = $request->golongan_id;
                $datas->angkutan_id         = $request->angkutan_id;
                $datas->tujuan_sppd_id      = $request->tujuan_sppd_id;
                $datas->transportasi        = $request->transportasi;
                $datas->uang_harian         = $request->uang_harian;
                $datas->uang_representasi   = $request->uang_representasi;
                $datas->uang_penginapan     = $request->uang_penginapan;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Employe::all();
 
    	$pdf = PDF::loadview('pdf.employe',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Employe::all();
 
    	$pdf = PDF::loadview('pdf.employe',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Employe::where('id',$id)->delete();
 
    }
}
