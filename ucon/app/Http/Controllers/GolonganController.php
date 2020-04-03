<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Golongan;
use PDF;

class GolonganController extends Controller
{
    public function index($notif=null){
        if(route_golongan(Auth::user()->role_id)>0){
            $page="Daftar Golongan";
            $ketpage="Daftar golongan Aktif";
            $url='golongan/';
            $golongan=Golongan::all();
            $modalgolongan=Golongan::all();
            $alert=Golongan::all();
            $notif=$notif;
            return view( 'golongan.index',compact('page','ketpage','url','golongan','notif','modalgolongan','alert'));
        }else{
            $page="Error Not Found 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function store(request $request, $act){
        if (trim($request->golongan) == '') {$error[] = '-  Kolom Golongan Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas               = new Golongan;
                $datas->golongan     = $request->golongan;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas               = Golongan::find($request->id);
                $datas->golongan     = $request->golongan;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Golongan::all();
 
    	$pdf = PDF::loadview('pdf.golongan',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Golongan::all();
 
    	$pdf = PDF::loadview('pdf.golongan',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Golongan::where('id',$id)->delete();
 
    }
}
