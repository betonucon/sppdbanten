<?php

function bupati(){
    $data=App\Employe::where('jabatan_id',1)->first();
    return $data;
}
function wakil_bupati(){
    $data=App\Employe::where('jabatan_id',2)->first();
    return $data;
}
function sekretaris_daerah(){
    $data=App\Employe::where('jabatan_id',3)->first();
    return $data;
}
function asda(){
    $data=App\Employe::where('jabatan_id',4)->first();
    return $data;
}
function asda2(){
    $data=App\Employe::where('jabatan_id',5)->first();
    return $data;
}
function kuasa_bendahara(){
    $data=App\Employe::where('jabatan_id',6)->first();
    return $data;
}
function bendahara(){
    $data=App\Employe::where('jabatan_id',7)->first();
    return $data;
}
function koordinasi_pptk(){
    $data=App\Employe::where('jabatan_id',8)->first();
    return $data;
}