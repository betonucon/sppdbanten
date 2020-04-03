<?php

function on_php_id()
{
   return 'My Helper Ready';
}
function menu(){
   $data=App\Hasrole::where('role_id',Auth::user()->role_id)->where('akses',1)->get();
   return $data;
}
function sub_menu(){
   $data=App\Hasrole::where('role_id',Auth::user()->role_id)->where('akses',0)->get();
   return $data;
}

function detail_surat($id,$urut){
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->where('urut',$urut)->first();
   return $data;
}
function jumlah_pegawai($id){
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->count();
   return $data;
}
function detail_utama($id,$urut){
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->where('urut',$urut)->get();
   return $data;
}
function detailsurat($id){
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->where('urut','!=',0)->get();
   return $data;
}
function acces($id){
   $data=App\Route::where('id',$id)->first();
   return $data;
}

function cek_role($id){
   $data=App\Permision::where('id',$id)->first();
   return $data['name'];
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

function cek_jabatan($id){
   $data=App\Jabatan::where('id',$id)->first();
   return $data;
}
function jabatan(){
   $data=App\Jabatan::all();
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
   $golongan=App\Pegawai::where('bidang_id',Auth::user()->bidang_id)->get();
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
   return $golongan['golongan'];
}
function status($id)
{
   $data=App\Status::where('sts',$id)->first();
   $text='<p style="color:'.$data->color.'">'.$data['name'].'</p>';
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
   return $data['name'];
}

function transportasi($id)
{
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('transportasi');
   return $data;
}
function uang_harian($id)
{
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('uang_harian');
   return $data;
}
function uang_penginapan($id)
{
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('uang_penginapan');
   return $data;
}
function uang_representasi($id)
{
   $data=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('uang_representasi');
   return $data;
}
function harga_tiket($id)
{
   $berangkat=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('harga_berangkat');
   $kembali=App\Detailsurattugas::where('surat_tugas_id',$id)->sum('harga_kembali');
   if($berangkat==''){
      $data=0;
   }else{
      $data=($berangkat+$kembali);
   }
   return $data;
   
}

function kegiatan()
{
   $golongan=App\Kegiatan::where('bidang_id',Auth::user()->bidang_id)->get();
   return $golongan;
}

function cek_kegiatan($id)
{
   $golongan=App\Kegiatan::where('id',$id)->first();
   return $golongan->title;
}
function bidang()
{
   $data=App\Bidang::all();
   return $data;
}
function kop_surat($id)
{
   $data=App\Bidang::where('id',$id)->first();
   return $data['kopsurat'];
}
function kop_surat2($id)
{
   $data=App\Bidang::where('id',$id)->first();
   return $data['kopsurat2'];
}
function lokasi($id)
{
   $data=App\Bidang::where('id',$id)->first();
   return $data['lokasi'];
}

function cek_bidang($id)
{
   $data=App\Bidang::where('id',$id)->first();
   return $data;
}


function kabag()
{
   $data=App\Employe::where('akses','3')->first();
   return $data;
}
function tanggal($id)
{
   $data=date('d/m/Y',strtotime($id));
   return $data;
}
function tgl($id)
{
   $data=date('d',strtotime($id));
   return $data;
}
function bln($id)
{
   $data=date('m',strtotime($id));
   $bulan=bulan($data);
   return $bulan;
}
function thn($id)
{
   $data=date('Y',strtotime($id));
   return $data;
}
function uang($id)
{
   $data=number_format($id,0);
   return $data;
}
function text_tanggal($id)
{
   $tgl=explode('-',$id);
   $data=$tgl[2].'  '.bulan($tgl[1]).' '.$tgl[0];
   return $data;
}
function tanggal_surat($id)
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
   $data=App\Employe::whereIn('jabatan_id',['1','2','3','4','5'])->get();
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
   return $data['name'];
}

function pilih_jenis_sppd()
{
   $data=App\Jenissppd::all();
   return $data;
}
function jenis_sppd($id)
{
   $data=App\Jenissppd::where('id',$id)->first();
   return $data['name'];
}

function author($id)
{
   $data=App\User::where('nim',$id)->first();
   return $data['name'];
}

function akses($id)
{
   $data=App\Akses::where('id',$id)->first();
   return $data['name'];
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