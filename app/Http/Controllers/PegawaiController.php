<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Pegawai;

class PegawaiController extends Controller
{
    public function index($notif=null){
        $page="Daftar Pegawai";
        $ketpage="Daftar Pegawai Aktif dan Non Aktif";
        $url='pegawai/';
        $pegawai=Pegawai::all();
        $modalpegawai=Pegawai::all();
        $alert=Pegawai::all();
        $notif=$notif;
        return view( 'pegawai.index',compact('page','ketpage','url','pegawai','notif','modalpegawai','alert'));
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
                $datas->status       = $request->status;
                $datas->nomor_rekening       = $request->nomor_rekening;
                $datas->save();
                echo'ok';
            }
        }
    }


}
