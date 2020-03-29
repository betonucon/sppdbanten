<?php

function on_php_id()
{
   return 'My Helper Ready';
}
function menu(){
   $data=App\Hasrole::where('role_id',Auth::user()->role_id)->get();
   return $data;
}

function acces($id){
   $data=App\Route::where('id',$id)->first();
   return $data;
}

function cek_role($id){
   $data=App\Permision::where('id',$id)->first();
   return $data->name;
}

function permision_role($route){
   $data=App\Hasrole::where('role_id',Auth::user()->role_id)->where('route_id',$route)->count();
   return $data;
}

function cek_permision_role($route){
   $data=App\Hasrole::where('role_id',Auth::user()->role_id)->where('route_id',$route)->first();
   $permision=cek_role($data['permision_id']);
   return $permision;
}
function has_role($id){
   $data=App\Hasrole::where('id',$id)->first();
   return $data;
}

function routes(){
   $data=App\Route::all();
   return $data;
}
function permision(){
   $data=App\Permision::all();
   return $data;
}
function users($id){
   $data=App\User::where('nim',$id)->first();
   return $data;
}

function role($id){
   $data=App\Role::where('id',$id)->first();
   return $data;
}

function pilih_role(){
   $data=App\Role::all();
   return $data;
}
function antara_tanggal($id,$tanggal){
	$data = date('Y-m-d', strtotime('+'.$id.' days', strtotime($tanggal)));
	return $data;
}

function penyebut($nilai) {
   $nilai = abs($nilai);
   $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
   $temp = "";
   if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
   } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " belas";
   } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
   } else if ($nilai < 200) {
      $temp = " seratus" . penyebut($nilai - 100);
   } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
   } else if ($nilai < 2000) {
      $temp = " seribu" . penyebut($nilai - 1000);
   } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
   } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
   } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
   } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
   }     
   return $temp;
}

function terbilang($nilai) {
   if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
   } else {
      $hasil = trim(penyebut($nilai));
   }     		
   return $hasil;
}


function rupiah($id)
{
   $golongan=number_format($id,0);
   return $golongan;
}
function golongan()
{
   $golongan=App\Golongan::all();
   return $golongan;
}

function selisih($a,$b)
{
   $tgl1 = new DateTime($a);
	$tgl2 = new DateTime($b);
	$d = $tgl2->diff($tgl1)->days + 1;
   return $d;
}

function pegawai()
{
   $golongan=App\Pegawai::all();
   return $golongan;
}
function cekjasaperjalanan($id)
{
   $data=App\Jasaperjalanan::where('id',$id)->first();
   return $data;
}
function jasaperjalanan()
{
   $data=App\Jasaperjalanan::all();
   return $data;
}

function cekpegawai($id)
{
   $golongan=App\Pegawai::where('id',$id)->first();
   return $golongan;
}

function cekgolongan($id)
{
   $golongan=App\Golongan::where('id',$id)->first();
   return $golongan->golongan;
}
function status($id)
{
   $data=App\Status::where('sts',$id)->first();
   $text='<p style="color:'.$data->color.'">'.$data->name.'</p>';
   return $text;
}

function cari_golongan($id)
{
   $golongan=App\Golongan::where('golongan',$id)->first();
   return $golongan->id;
}

function pilih_angkutan()
{
   $data=App\Angkutan::all();
   return $data;
}

function angkutan($id)
{
   $data=App\Angkutan::where('id',$id)->first();
   return $data->name;
}

function kegiatan()
{
   $golongan=App\Kegiatan::all();
   return $golongan;
}

function cek_kegiatan($id)
{
   $golongan=App\Kegiatan::where('id',$id)->first();
   return $golongan->title;
}

function bendahara()
{
   $data=App\Employe::where('akses','2')->first();
   return $data;
}
function tanggal($id)
{
   $data=date('d/m/Y',strtotime($id));
   return $data;
}
function text_tanggal($id)
{
   $tgl=explode('-',$id);
   $data=$tgl[2].'  '.bulan($tgl[1]).' '.$tgl[0];
   return $data;
}
function pejabat($id)
{
   $data=App\Employe::where('id',$id)->first();
   return $data;
}

function pilih_employe()
{
   $data=App\Employe::where('akses','1')->get();
   return $data;
}

function pilih_tujuan_sppd($id)
{
   $data=App\Tujuan::where('jenis_sppd_id',$id)->get();
   return $data;
}

function tujuan_sppd($id)
{
   $data=App\Tujuan::where('id',$id)->first();
   return $data->name;
}

function pilih_jenis_sppd()
{
   $data=App\Jenissppd::all();
   return $data;
}
function jenis_sppd($id)
{
   $data=App\Jenissppd::where('id',$id)->first();
   return $data->name;
}

function author($id)
{
   $data=App\User::where('nim',$id)->first();
   return $data->name;
}

function akses($id)
{
   $data=App\Akses::where('id',$id)->first();
   return $data->name;
}

function pilih_akses()
{
   $data=App\Akses::all();
   return $data;
}

function nomor()
{
   $data=App\Surattugas::orderBy('id','desc')->firstOrFail();
   $nomor=$data['id'].'/001-SETDA/'.date('Y');
   return $nomor;
}
function ceksurattugas($id)
{
   $data=App\Surattugas::where('id',$id)->first();
   return $data->nomor_surat;
}

function employe()
{
   $data=App\Employe::where('akses','!=','bendahara')->get();
   return $data;
}

function oon()
{
   return 'My Helper Ready';
}

function anti_injection($data){
    $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    
    return $filter;
    
}

function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}