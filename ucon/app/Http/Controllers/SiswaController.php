<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
class SiswaController extends Controller
{
    public function view(){
        //return view( 'siswa.index', compact('obyeks') );
        return view( 'siswa.index');
    }

    public function store(request $request, $act){
        if (trim($request->nama) == '') {$error[] = '-  Kolom Nama Harus diisi';}
        // if (trim($request->nip) == '') {$error[] = '-  Kolom NIP Harus diisi';}
        // if (trim($request->jabatan) == '') {$error[] = '-  Kolom Jabatan Harus diisi';}
        // if (trim($request->golongan) == '') {$error[] = '-  Kolom Golongan Harus diisi';}
        // if (trim($request->pangkat) == '') {$error[] = '-  Kolom Pangkat  Harus diisi';}
        // if (trim($request->nomor_rekening) == '') {$error[] = '-  Kolom Nomor Rekening Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            // if($act=='new'){
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
            // }else{
            //    echo'ok';
            // }
        }
    }
}
