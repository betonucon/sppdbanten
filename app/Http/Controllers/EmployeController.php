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
        $page="Employe";
        $ketpage="Daftar Employe";
        $url='employe/';
        $employe=Employe::all();
        $modalemploye=Employe::all();
        $alert=Employe::all();
        $notif=$notif;
        return view( 'employe.index',compact('page','ketpage','url','employe','notif','modalemploye','alert'));
    }

    public function store(request $request, $act){
        if (trim($request->nip) == '') {$error[] = '-  Kolom NIP Harus diisi';}
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Harus diisi';}
        if (trim($request->email) == '') {$error[] = '-  Kolom Email Harus diisi';}
        if (trim($request->akses) == '') {$error[] = '-  Pilih Akses';}
        if (trim($request->role_id) == '') {$error[] = '-  Pilih Role';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas                      = new Employe;
                $datas->nip                 = $request->nip;
                $datas->name                = $request->name;
                $datas->role_id             = $request->role_id;
                $datas->akses               = $request->akses;
                $datas->save();

                $users                      = new User;
                $users->nim                 = $request->nip;
                $users->name                = $request->name;
                $users->email               = $request->email;
                $users->role_id             = $request->role_id;
                $users->password            = Hash::make($request->nip);
                $users->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas                      = Employe::find($request->id);
                $datas->nip                 = $request->nip;
                $datas->name                = $request->name;
                $datas->role_id             = $request->role_id;
                $datas->akses               = $request->akses;
                $datas->save();

                $users                      = User::where('nim',$request->nip)->first();
                $users->name                = $request->name;
                $users->role_id             = $request->role_id;
                $users->save();

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
