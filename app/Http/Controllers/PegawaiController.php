<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Pegawai;
use PDF;
class PegawaiController extends Controller
{
    public function index($notif=null){
        if(permision_role(6)>0){
            $page="Daftar Pegawai";
            $ketpage="Daftar Pegawai ".cek_bidang(Auth::user()->bidang_id)['name'];
            $url='pegawai/';
            $pegawai=Pegawai::where('bidang_id',Auth::user()->bidang_id)->get();
            $modalpegawai=Pegawai::where('bidang_id',Auth::user()->bidang_id)->get();
            $alert=Pegawai::where('bidang_id',Auth::user()->bidang_id)->get();
            $notif=$notif;
           
            return view( 'pegawai.index',compact('page','ketpage','url','pegawai','notif','modalpegawai','alert'));
        }else{
            $page="Error Not Foud 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function report($notif=null){
        $page="Report Pegawai";
        $ketpage="Daftar Pegawai Aktif dan Non Aktif";
        $url='pegawai/report/report';
        $pegawai=Pegawai::all();
        $modalpegawai=Pegawai::all();
        $alert=Pegawai::all();
        $notif=$notif;
        return view( 'pegawai.report',compact('page','ketpage','url','pegawai','notif','modalpegawai','alert'));
    }

    public function store(request $request, $act){
        if (trim($request->nama) == '') {$error[] = '-  Kolom Nama Harus diisi';}
        if (trim($request->nip) == '') {$error[] = '-  Kolom NIP Harus diisi';}
        if (trim($request->jabatan) == '') {$error[] = '-  Kolom Jabatan Harus diisi';}
        if (trim($request->golongan) == '') {$error[] = '-  Kolom Golongan Harus diisi';}
        if (trim($request->pangkat) == '') {$error[] = '-  Kolom Pangkat  Harus diisi';}
        if (trim($request->nomor_rekening) == '') {$error[] = '-  Kolom Nomor Rekening Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas               = new Pegawai;
                $datas->nip          = $request->nip;
                $datas->nama         = $request->nama;
                $datas->pangkat      = $request->pangkat;
                $datas->jabatan      = $request->jabatan;
                $datas->golongan     = $request->golongan;
                $datas->bidang_id    = Auth::user()->bidang_id;
                $datas->status       = $request->status;
                $datas->nomor_rekening       = $request->nomor_rekening;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas               = Pegawai::find($request->id);
                $datas->nip          = $request->nip;
                $datas->nama         = $request->nama;
                $datas->pangkat      = $request->pangkat;
                $datas->jabatan      = $request->jabatan;
                $datas->golongan     = $request->golongan;
                $datas->bidang_id    = Auth::user()->bidang_id;
                $datas->status       = $request->status;
                $datas->nomor_rekening       = $request->nomor_rekening;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('pdf.pegawai',['pegawai'=>$pegawai]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('pdf.pegawai',['pegawai'=>$pegawai]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Pegawai::where('id',$id)->delete();
 
    }


}
