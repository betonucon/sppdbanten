<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Employe;
use App\User;
use PDF;

class EmployeController extends Controller
{
    public function index($notif=null){
        if(route_pengaturan(Auth::user()->role_id)>0){
            $page="Employe";
            $ketpage="Daftar Employe";
            $url='employe/';
            $employe=Employe::all();
            $modalemploye=Employe::all();
            $alert=Employe::all();
            $notif=$notif;
            return view( 'employe.index',compact('page','ketpage','url','employe','notif','modalemploye','alert'));
        }else{
            $page="Error Not Found 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function store(request $request, $act){
        if (trim($request->nip) == '') {$error[] = '-  Kolom NIP Harus diisi';}
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Harus diisi';}
        if (trim($request->pangkat) == '') {$error[] = '-  Kolom Pangkat Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas                      = new Employe;
                $datas->nip                 = $request->nip;
                $datas->name                = $request->name;
                $datas->pangkat             = $request->pangkat;
                $datas->save();

                echo'ok';

            }else{
                $datas                      = Employe::find($request->id);
                $datas->nip                 = $request->nip;
                $datas->name                = $request->name;
                $datas->pangkat             = $request->pangkat;
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
