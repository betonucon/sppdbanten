<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Surattugas;
use App\Kegiatan;
use App\Pegawai;
use App\Golongan;
use App\Domlak;
use App\Riwayatsppd;
use App\Detailsurattugas;
use PDF;

class SurattugasController extends Controller
{
    public function index($notif=null){
        if(permision_role(3)>0){
            $page="Surat Tugas";
            $ketpage="Daftar Surat Tugas";
            $url='surat_tugas/';
            $data=Surattugas::all();
            $modaldata=Surattugas::all();
            $pegai=Pegawai::all();
            //dd(cek_kegiatan(24));
            $alert=Surattugas::all();
            $notif=$notif;
            $id = collect([]);
            $pegawai_id = collect([]);
            $cekpegawai_id = collect([]);
            $transportasi = collect([]);
            $harian = collect([]);
            $representasi = collect([]);
            $penginapan = collect([]);
            foreach($modaldata as $dataa){
                for($x=0;$x<$dataa->jumlah;$x++){
                    $detail=Detailsurattugas::where('surat_tugas_id',$dataa->id)->where('urut',$x)->first();
                    foreach($pegai as $pe){
                        if($pe['id']==$detail['pegawai_id']){
                            $pegawai_id->push([
                                'selected'   =>'selected'
                            ]);
                        }else{
                            $pegawai_id->push([
                                'selected'   =>''
                            ]);
                        }
                    }
                    $transportasi->push([
                        'transportasi' => $detail['transportasi']
                    ]);
                    $harian->push([
                        'harian'       => $detail['uang_harian']
                    ]);
                    $representasi->push([
                        'representasi' => $detail['uang_representasi']
                    ]);
                    $penginapan->push([
                        'penginapan'   => $detail['uang_penginapan']
                    ]);
                    
                    $cekpegawai_id->push([
                        'pegawai_id'   => $detail['pegawai_id']
                    ]);
                    $id->push([
                        'id'   => $detail['id']
                    ]);
                }
            }
            //dd(nomor());
            return view( 'surat_tugas.index',compact('page','ketpage','url','data','notif','modaldata','alert','transportasi','harian','representasi','penginapan','pegawai_id','id'));
        }else{
            $page="Error Not Foud 404";
            $ketpage="";
            $url='/';
            return view( 'error',compact('page','ketpage','url'));
        }
    }

    public function report($notif=null){
        $page="Report Surat Tugas";
        $ketpage="Daftar Surat Tugas";
        $url='surat_tugas/report/report';
        $data=Surattugas::all();
        $modaldata=Surattugas::all();
        $pegai=Pegawai::all();
        //dd(cek_kegiatan(24));
        $alert=Surattugas::all();
        $notif=$notif;
        $id = collect([]);
        $pegawai_id = collect([]);
        $cekpegawai_id = collect([]);
        $transportasi = collect([]);
        $harian = collect([]);
        $representasi = collect([]);
        $penginapan = collect([]);
        foreach($modaldata as $dataa){
            for($x=0;$x<$dataa->jumlah;$x++){
                $detail=Detailsurattugas::where('surat_tugas_id',$dataa->id)->where('urut',$x)->first();
                foreach($pegai as $pe){
                    if($pe['id']==$detail['pegawai_id']){
                        $pegawai_id->push([
                            'selected'   =>'selected'
                        ]);
                    }else{
                        $pegawai_id->push([
                            'selected'   =>''
                        ]);
                    }
                }
                $transportasi->push([
                    'transportasi' => $detail['transportasi']
                ]);
                $harian->push([
                    'harian'       => $detail['uang_harian']
                ]);
                $representasi->push([
                    'representasi' => $detail['uang_representasi']
                ]);
                $penginapan->push([
                    'penginapan'   => $detail['uang_penginapan']
                ]);
                
                $cekpegawai_id->push([
                    'pegawai_id'   => $detail['pegawai_id']
                ]);
                $id->push([
                    'id'   => $detail['id']
                ]);
            }
        }
        //dd(nomor());
        return view( 'surat_tugas.report',compact('page','ketpage','url','data','notif','modaldata','alert','transportasi','harian','representasi','penginapan','pegawai_id','id'));
    }

    public function index_kwitansi($notif=null){
        $page="Report Kwitansi";
        $ketpage="Kwitansi SPPD";
        $url='surat_tugas/kwitansi/ok';
        $data=Surattugas::all();
        $modaldata=Surattugas::all();
        $pegai=Pegawai::all();
        //dd(cek_kegiatan(24));
        $alert=Surattugas::all();
        $notif=$notif;
        $id = collect([]);
        $pegawai_id = collect([]);
        $cekpegawai_id = collect([]);
        $transportasi = collect([]);
        $harian = collect([]);
        $representasi = collect([]);
        $penginapan = collect([]);
        foreach($modaldata as $dataa){
            for($x=0;$x<$dataa->jumlah;$x++){
                $detail=Detailsurattugas::where('surat_tugas_id',$dataa->id)->where('urut',$x)->first();
                foreach($pegai as $pe){
                    if($pe['id']==$detail['pegawai_id']){
                        $pegawai_id->push([
                            'selected'   =>'selected'
                        ]);
                    }else{
                        $pegawai_id->push([
                            'selected'   =>''
                        ]);
                    }
                }
                $transportasi->push([
                    'transportasi' => $detail['transportasi']
                ]);
                $harian->push([
                    'harian'       => $detail['uang_harian']
                ]);
                $representasi->push([
                    'representasi' => $detail['uang_representasi']
                ]);
                $penginapan->push([
                    'penginapan'   => $detail['uang_penginapan']
                ]);
                
                $cekpegawai_id->push([
                    'pegawai_id'   => $detail['pegawai_id']
                ]);
                $id->push([
                    'id'   => $detail['id']
                ]);
            }
        }
        //dd(nomor());
        return view( 'surat_tugas.kwitansi',compact('page','ketpage','url','data','notif','modaldata','alert','transportasi','harian','representasi','penginapan','pegawai_id','id'));
    }

    public function detail($id){
        $page="Surat Tugas";
        $data=Surattugas::find($id);
        $detail=Detailsurattugas::where('surat_tugas_id',$id)->orderBy('urut','asc')->get();
        $ketpage="Daftar Surat Tugas";
        $url='surat_tugas/';
        $total=0;
        foreach($detail as $det){
            $tot=$det['transportasi'] + $det['uang_harian']+$det['uang_representasi']+$det['uang_penginapan'];
            $trs=$det['transportasi'];
            $har=$det['uang_harian'];
            $rep=$det['uang_representasi'];
            $peng=$det['uang_penginapan'];
            $total+=$tot;
        }
        return view( 'surat_tugas.detail',compact('page','ketpage','url','data','detail','total'));
    }

    public function store_detail(request $request){
        $update         =Surattugas::find($request->surat_tugas_id);
        $update->sts    = 2;
        $update->save();

        $jum=count($request->pegawai_id);
        $delete=Riwayatsppd::where('surat_tugas_id',$request->surat_tugas_id)->delete();

        for($x=0;$x<$jum;$x++){
            if($request->pegawai_id[$x]==''){

            }else{
                if($request->id[$x]==''){
                    $datas                      = new Detailsurattugas;
                    $datas->surat_tugas_id      = $request->surat_tugas_id;
                    $datas->pegawai_id          = $request->pegawai_id[$x];
                    $datas->transportasi        = $request->transportasi[$x];
                    $datas->uang_harian         = $request->harian[$x];
                    $datas->uang_representasi   = $request->representasi[$x];
                    $datas->uang_penginapan     = $request->penginapan[$x];
                    $datas->urut                = $x;
                    $datas->save();
                }else{
                    $datas                      = Detailsurattugas::find($request->id[$x]);
                    $datas->surat_tugas_id      = $request->surat_tugas_id;
                    $datas->pegawai_id          = $request->pegawai_id[$x];
                    $datas->transportasi        = $request->transportasi[$x];
                    $datas->uang_harian         = $request->harian[$x];
                    $datas->uang_representasi   = $request->representasi[$x];
                    $datas->uang_penginapan     = $request->penginapan[$x];
                    $datas->urut                = $x;
                    $datas->save();
                }
                    
            }

            for($s=1;$s<=$request->selisih;$s++){
                $detdatas                      = new Riwayatsppd;
                $detdatas->surat_tugas_id      = $request->surat_tugas_id;
                $detdatas->tanggal             = antara_tanggal($s,$request->date_mulai);
                $detdatas->pegawai_id          = $request->pegawai_id[$x];
                $detdatas->save();
            }
        }
        echo'ok';
    }
    public function store(request $request, $act){
        if (trim($request->jenis_sppd_id) == '') {$error[] = '-  Pilih Jenis SPPD';}
        if (trim($request->date_surat) == '') {$error[] = '-  Kolom Tanggal Surat Harus diisi';}
        if (trim($request->date_mulai) == '') {$error[] = '-  Kolom Tanggal Tugas Harus diisi';}
        if (trim($request->date_sampai) == '') {$error[] = '-  Kolom Tanggal Selesai Harus diisi';}
        if (trim($request->judul_surat) == '') {$error[] = '-  Kolom Judul Surat Harus diisi ';}
        if (trim($request->nomor_sppd) == '') {$error[] = '-  Kolom Nomor SPPD Harus diisi';}
        if (trim($request->kegiatan_id) == '') {$error[] = '-  Pilih Kegiatan';}
        if (trim($request->angkutan_id) == '') {$error[] = '-  Pilih Angkutan Yang dipergunakan';}
        if (trim($request->pejabat_id) == '') {$error[] = '-  Pilih Pejabat Yang Berwewenang';}
        if (trim($request->tujuan_sppd_id) == '') {$error[] = '-  Pilih Tujuan SPPD';}
        if (trim($request->tujuan) == '') {$error[] = '-  Kolom Tempat Tujuan Harus diisi';}
        if (trim($request->jasa_perjalanan_id) == '') {$error[] = '-  Pilih Layanan Perjalanan SPPD';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas                      = new Surattugas;
                $datas->date_surat          = $request->date_surat;
                $datas->date_mulai          = $request->date_mulai;
                $datas->date_sampai         = $request->date_sampai;
                $datas->jumlah              = $request->jumlah;
                $datas->tujuan              = $request->tujuan;
                $datas->kunjungan           = $request->kunjungan;
                $datas->dasar               = $request->dasar;
                $datas->jasa_perjalanan_id    = $request->jasa_perjalanan_id;
                $datas->maksud              = $request->maksud;
                $datas->catatan             = $request->catatan;
                $datas->judul_surat         = $request->judul_surat;
                $datas->nomor_sppd          = $request->nomor_sppd;
                $datas->nomor_surat         = $request->nomor_surat;
                $datas->filelampiran        = $request->nomor_surat;
                $datas->filedokumen         = $request->nomor_surat;
                $datas->kegiatan_id         = $request->kegiatan_id;
                $datas->pejabat_id          = $request->pejabat_id;
                $datas->jenis_sppd_id       = $request->jenis_sppd_id;
                $datas->angkutan_id         = $request->angkutan_id;
                $datas->tujuan_sppd_id      = $request->tujuan_sppd_id;
                $datas->selisih             = selisih($request->date_mulai,$request->date_sampai);
                $datas->sts                 = 1;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas                      = Surattugas::find($request->id);
                $datas->date_surat          = $request->date_surat;
                $datas->date_mulai          = $request->date_mulai;
                $datas->date_sampai         = $request->date_sampai;
                $datas->jumlah              = $request->jumlah;
                $datas->tujuan              = $request->tujuan;
                $datas->kunjungan           = $request->kunjungan;
                $datas->dasar               = $request->dasar;
                $datas->jasa_perjalanan_id  = $request->jasa_perjalanan_id;
                $datas->maksud              = $request->maksud;
                $datas->catatan             = $request->catatan;
                $datas->judul_surat         = $request->judul_surat;
                $datas->nomor_sppd          = $request->nomor_sppd;
                $datas->nomor_surat         = $request->nomor_surat;
                $datas->kegiatan_id         = $request->kegiatan_id;
                $datas->pejabat_id          = $request->pejabat_id;
                $datas->jenis_sppd_id       = $request->jenis_sppd_id;
                $datas->angkutan_id         = $request->angkutan_id;
                $datas->tujuan_sppd_id      = $request->tujuan_sppd_id;
                $datas->selisih             = selisih($request->date_mulai,$request->date_sampai);
                $datas->save();
                echo'ok';
            }
        }
    }

    public function tujuan($id){
        foreach(pilih_tujuan_sppd($id) as $tujuan){
            echo' <option value="'.$tujuan->id.'">'.$tujuan->name.'</option>';
        }
       
    }

    public function cari_jumlah($id){
        $data = Kegiatan::where('id',$id)->first();
        echo $data['jumlah'];
    }

    public function cek_nilai($z,$jenis,$angkutan,$tujuan){
        $data = Pegawai::where('id',$z)->first();
        $golongan=cari_golongan($data['golongan']);
        $nilai = Domlak::where('golongan_id',$golongan)->where('angkutan_id',$angkutan)->where('tujuan_sppd_id',$tujuan)->first();
        echo $nilai['transportasi'].'-'.$nilai['uang_harian'].'-'.$nilai['uang_representasi'].'-'.$nilai['uang_penginapan'];
    }

    public function pdf(){
        $data = Golongan::all();
 
        $pdf = PDF::loadview('pdf.surat_tugas',['data'=>$data]);
        $pdf->setPaper('A3', 'landscape');
    	return $pdf->stream();
    }

    public function pdf_kwitansi($id){
        $data = Surattugas::where('id',$id)->first();
        $detail = Detailsurattugas::where('surat_tugas_id',$id)->get();
        $total=0;
        $transportasi=0;
        $representasi=0;
        $harian=0;
        $penginapan=0;
        foreach($detail as $det){
            $tot=$det['transportasi'] + $det['uang_harian'];
            $trs=$det['transportasi'];
            $har=$det['uang_harian'];
            $rep=$det['uang_representasi'];
            $peng=$det['uang_penginapan'];
            $total=$tot;
            $transportasi=$trs;
            $harian=$har;
            $representasi=$rep;
            $penginapan=$peng;
        }
        
        $pdf = PDF::loadview('pdf.kwitansi',['data'=>$data,'detail'=>$detail,'total'=>$total,'transportasi'=>$transportasi,'harian'=>$harian,'representasi'=>$representasi,'penginapan'=>$penginapan]);
        //$pdf->setPaper('A3', 'landscape');
    	return $pdf->stream();
    }

    public function pdf_sppd($id){
        $data = Surattugas::where('id',$id)->first();
        $detail = Detailsurattugas::where('surat_tugas_id',$id)->where('urut','!=',0)->get();
        $nipdetail = Detailsurattugas::where('surat_tugas_id',$id)->where('urut','!=',0)->get();
        $diperintah = Detailsurattugas::where('surat_tugas_id',$id)->where('urut',0)->first();
        $total=0;
        $transportasi=0;
        $representasi=0;
        $harian=0;
        $penginapan=0;
        foreach($detail as $det){
            $tot=$det['transportasi'] + $det['uang_harian'];
            $trs=$det['transportasi'];
            $har=$det['uang_harian'];
            $rep=$det['uang_representasi'];
            $peng=$det['uang_penginapan'];
            $total=$tot;
            $transportasi=$trs;
            $harian=$har;
            $representasi=$rep;
            $penginapan=$peng;
        }
        
        $pdf = PDF::loadview('pdf.sppd',['data'=>$data,'detail'=>$detail,'total'=>$total,'transportasi'=>$transportasi,'harian'=>$harian,'representasi'=>$representasi,'penginapan'=>$penginapan,'diperintah'=>$diperintah,'nipdetail'=>$nipdetail]);
        //$pdf->setPaper('A3', 'landscape');
    	return $pdf->stream();
    }

    public function pdf_spt($id){
        $data = Surattugas::where('id',$id)->first();
        $detail = Detailsurattugas::where('surat_tugas_id',$id)->where('urut','!=',0)->get();
        $detailspt = Detailsurattugas::where('surat_tugas_id',$id)->orderBy('urut','asc')->get();
        $nipdetail = Detailsurattugas::where('surat_tugas_id',$id)->where('urut','!=',0)->get();
        $diperintah = Detailsurattugas::where('surat_tugas_id',$id)->where('urut',0)->first();
        $total=0;
        $transportasi=0;
        $representasi=0;
        $harian=0;
        $penginapan=0;
        foreach($detail as $det){
            $tot=$det['transportasi'] + $det['uang_harian'];
            $trs=$det['transportasi'];
            $har=$det['uang_harian'];
            $rep=$det['uang_representasi'];
            $peng=$det['uang_penginapan'];
            $total=$tot;
            $transportasi=$trs;
            $harian=$har;
            $representasi=$rep;
            $penginapan=$peng;
        }
        
        $pdf = PDF::loadview('pdf.spt',['data'=>$data,'detail'=>$detail,'total'=>$total,'transportasi'=>$transportasi,'harian'=>$harian,'representasi'=>$representasi,'penginapan'=>$penginapan,'diperintah'=>$diperintah,'nipdetail'=>$nipdetail,'detailspt'=>$detailspt]);
        //$pdf->setPaper('A3', 'landscape');
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Golongan::all();
 
    	$pdf = PDF::loadview('pdf.golongan',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Golongan::where('id',$id)->delete();
 
    }
}
