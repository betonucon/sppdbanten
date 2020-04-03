<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Bidang;
use PDF;

class BidangController extends Controller
{
    public function index($notif=null){
        if(route_bidang(Auth::user()->role_id)>0){
            $page="Daftar Bidang";
            $ketpage="Daftar Bidang";
            $url='bidang/';
            $bidang=Bidang::all();
            $modalbidang=Bidang::all();
            $alert=Bidang::all();
            $notif=$notif;
            return view( 'bidang.index',compact('page','ketpage','url','bidang','notif','modalbidang','alert'));
        }else{
            $page="Error Not Found 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function store(request $request, $act){
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Bidang Harus diisi';}
        if (trim($request->kopsurat) == '') {$error[] = '-  Kolom Kop Surat Harus diisi';}
        if (trim($request->kopsurat2) == '') {$error[] = '-  Kolom Kop Surat2 Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas               = new Bidang;
                $datas->name         = $request->name;
                $datas->kopsurat     = $request->kopsurat;
                $datas->kopsurat2    = $request->kopsurat2;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas               = Bidang::find($request->id);
                $datas->name         = $request->name;
                $datas->kopsurat     = $request->kopsurat;
                $datas->kopsurat2    = $request->kopsurat2;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Bidang::all();
 
    	$pdf = PDF::loadview('pdf.bidang',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Bidang::all();
 
    	$pdf = PDF::loadview('pdf.bidang',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Bidang::where('id',$id)->delete();
 
    }
}
