<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Kegiatan;
use PDF;

class KegiatanController extends Controller
{
    public function index($notif=null){
        if(permision_role(5)>0){
            $page="Kegiatan";
            $ketpage="Daftar Kegiatan";
            $url='kegiatan/';
            $kegiatan=Kegiatan::all();
            $modalkegiatan=Kegiatan::all();
            $alert=Kegiatan::all();
            $notif=$notif;
            return view( 'kegiatan.index',compact('page','ketpage','url','kegiatan','notif','modalkegiatan','alert'));
        }else{
            $page="Error Not Foud 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function store(request $request, $act){
        if (trim($request->title) == '') {$error[] = '-  Kolom Judul Kegiatan Harus diisi';}
        if (trim($request->jumlah) == '') {$error[] = '-  Pilih Jumlah Pegawai';}
        if (trim($request->kode_rekening) == '') {$error[] = '-  Kolom Kode Rekening Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas                      = new Kegiatan;
                $datas->title               = $request->title;
                $datas->jumlah              = $request->jumlah;
                $datas->kode_rekening       = $request->kode_rekening;
                $datas->users_id            = Auth::user()['nim'];

                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas                      = Kegiatan::find($request->id);
                $datas->title               = $request->title;
                $datas->jumlah              = $request->jumlah;
                $datas->kode_rekening       = $request->kode_rekening;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Kegiatan::all();
 
    	$pdf = PDF::loadview('pdf.kegiatan',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Kegiatan::all();
 
    	$pdf = PDF::loadview('pdf.kegiatan',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Kegiatan::where('id',$id)->delete();
 
    }
}
