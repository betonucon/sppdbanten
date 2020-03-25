<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
class SiswaController extends Controller
{
    public function view(){
        //return view( 'siswa.index', compact('obyeks') );
        return view( 'siswa.index');
    }
}
