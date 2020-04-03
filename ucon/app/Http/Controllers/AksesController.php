<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;
use PDF;

class AksesController extends Controller
{
    public function index($notif=null){
        $page="Data Pengguna";
        $ketpage="Daftar pengguna aplikasi";
        $url='akses/';
        $user=User::all();
        $modaluser=User::all();
        $alert=User::all();
        $notif=$notif;
        return view( 'akses.index',compact('page','ketpage','url','user','notif','modaluser','alert'));
    }

    public function store(request $request, $act){
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Harus diisi';}
        if (trim($request->email) == '') {$error[] = '-  Kolom Email Harus diisi';}
        if (trim($request->role_id) == '') {$error[] = '-  Pilih Role';}
        if (trim($request->bidang_id) == '') {$error[] = '-  Pilih Bidang';}
        if (trim($request->password) == '') {$error[] = '-  Kolom Password Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $username=explode('@',$request->email);
                $cek=User::where('email',$request->email)->count();
                if($cek>0){
                    echo '<b>Error</b>: <br /> -Email Sudah Terdaftar<br />';
                }else{
                    $users                      = new User;
                    $users->username            = $username[0];
                    $users->name                = $request->name;
                    $users->email               = $request->email;
                    $users->bidang_id           = $request->bidang_id;
                    $users->role_id             = $request->role_id;
                    $users->password            = Hash::make($request->password);
                    $users->screate             = $request->password;
                    $users->save();
                    echo'ok';
                }
            }else{
                $username=explode('@',$request->email);

                $users                      = User::where('id',$request->id)->first();
                $users->name                = $request->name;
                $users->username            = $username[0];
                $users->bidang_id           = $request->bidang_id;
                $users->role_id             = $request->role_id;
                $users->password            = Hash::make($request->password);
                $users->screate             = $request->password;
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
        $pegawai = User::where('id',$id)->delete();
 
    }
}
