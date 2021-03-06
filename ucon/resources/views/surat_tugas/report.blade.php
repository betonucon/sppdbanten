@extends('html.app')
<style>
    .dataTables_filter{
        float:right;
    }
    td{
        font-size: 13px;
    }
    th{
        font-size: 13px;
    }
    .ttd{
        padding:5px;
        background:#e9e9f3;
        border:solid 1px #fff;
    }
</style>
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
            
          

          <div class="box">
            <div class="box-body">
                <form method="post" action="{{url('/group/save')}}">   
                    <div class="mailbox-controls" style="background:#d6d6e3;margin-bottom:10px">
                        <!-- Check all button -->
                        
                        <div class="input-group ">
                                
                                <input type="text" value="{{$mulai}}" style="display:inline;width:30%" name="date_mulai" class="form-control" id="datepicker1">
                                <input type="text" value="{{$sampai}}" style="display:inline;width:30%;margin-left:5px" name="date_mulai" class="form-control" id="datepicker2">
                                <span  class="btn btn-primary btn-sm"  style="margin-top:2px" onclick="cari_data()"><i class="fa fa-search"></i> &nbsp;</span>
                                <span  class="btn btn-default btn-sm" onclick="reload()"  style="margin-left:5px;margin-top:2px" ><i class="fa fa-refresh"></i> &nbsp;</span>
                                <span  class="btn btn-success btn-sm"  style="margin-left:5px;margin-top:2px"  onclick="print()"><i class="fa fa-print"></i> Export PDF</span>
                        </div>
                        <div class="pull-right">
                        
                        </div>
                        <!-- /.pull-right -->
                    </div>
                
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Tgl Surat</th>
                                <th>Judul Surat</th>
                                <th>Nomor Surat</th>
                                <th>Kegiatan</th>
                                <th>Status</th>
                                <th width="5%">View</th>
                                <th width="5%">SPPD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $no=>$data)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$data->date_surat}}</td>
                                    <td>{{$data->judul_surat}}</td>
                                    <td>{{$data->nomor_surat}}</td>
                                    <td>{{cek_kegiatan($data->kegiatan_id)}}</td>
                                    <td>{!!status($data->sts)!!}</td>
                                    <td><span  class="btn btn-default btn-sm" onclick="detail({{$data->id}})"><i class="fa fa-search"></i></span></td>
                                    <td><span  class="btn btn-default btn-sm" onclick="cetak_sppd({{$data->id}})"><i class="fa fa-print"></i></span></td>
                                            
                                    
                                 </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
@foreach($modaldata as $no=>$modalpegawai)
<div class="modal fade" id="modalreplay{{$modalpegawai->id}}">
    <div class="modal-dialog modal-lg" style="width:85%">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Surat Tugas</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="md-kiri">
                        <h4 class="modal-title">Informasi Surat Tugas</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Tanggal Surat:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{$modalpegawai->date_surat}}" name="date_surat" class="form-control pull-right" id="datepicker1{{$modalpegawai->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tugas:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{$modalpegawai->date_mulai}}" name="date_mulai" class="form-control pull-right" id="datepicker2{{$modalpegawai->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{$modalpegawai->date_sampai}}" name="date_sampai" class="form-control pull-right" id="datepicker3{{$modalpegawai->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat:</label>
                            <input type="text" readonly value="{{$modalpegawai->nomor_surat}}" class="form-control" id="nomor_surat" value="{{nomor()}}" name="nomor_surat">
                        </div>
                        <div class="form-group">
                            <label>Judul Surat:</label>
                            <input type="text" value="{{$modalpegawai->judul_surat}}" class="form-control" id="judul_surat" name="judul_surat">
                        </div>
                        <div class="form-group">
                            <label>Nomor SPPD:</label>
                            <input type="text" value="{{$modalpegawai->nomor_sppd}}" class="form-control" id="nomor_sppd" name="nomor_sppd">
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan:</label>
                            <select class="form-control select2" onchange="carijumlah(this.value,{{$modalpegawai->id}})" name="kegiatan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Kegiatan</option>
                                @foreach(kegiatan() as $kegiatan)
                                    <option value="{{$kegiatan->id}}" @if($modalpegawai->kegiatan_id==$kegiatan->id) selected @endif> {{$kegiatan->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pegawai:</label>
                            <input type="text" readonly class="form-control" value="{{$modalpegawai->jumlah}}" id="jumlah{{$modalpegawai->id}}" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label>Pejabat Berwenang:</label>
                            <select class="form-control select2"  name="pejabat_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Pejabat</option>
                                @foreach(pilih_employe() as $employe)
                                    <option value="{{$employe->id}}" @if($modalpegawai->pejabat_id==$employe->id) selected @endif> {{$employe->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis SPPD:</label>
                            <select class="form-control select2" onchange="cekcaritujuan(this.value,{{$modalpegawai->id}})" name="jenis_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Jenis SPPD</option>
                                @foreach(pilih_jenis_sppd() as $sppd)
                                    <option value="{{$sppd->id}}" @if($modalpegawai->jenis_sppd_id==$sppd->id) selected @endif> {{$sppd->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan SPPD:</label>
                            <select class="form-control select2" id="tujuan{{$modalpegawai->id}}"  name="tujuan_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                
                                @if($modalpegawai->tujuan_sppd_id!='')
                                    <option value="{{$modalpegawai->tujuan_sppd_id}} ">{{tujuan_sppd($modalpegawai->tujuan_sppd_id)}}</option>
                                @else
                                    <option value="">Pilih Tujuan</option>
                                @endif
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Dalam rangka Kunjungan Kerja:</label>
                            <input type="text"  class="form-control" id="kunjungan" value="{{$modalpegawai->kunjungan}}" name="kunjungan">
                        </div>
                        <div class="form-group">
                            <label>Tempat Tujuan:</label>
                            <input type="text"  class="form-control" id="tujuannya" value="{{$modalpegawai->tujuan}}" name="tujuan">
                        </div>
                        
                        <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                        <button type="button" id="simpan{{$modalpegawai->id}}" Onclick="simpan_data({{$modalpegawai->id}});" class="btn btn-primary pull-left">Simpan</button>
                    </div>
                    <div class="md-kanan">
                    <h4 class="modal-title">Angkutan dan Layanan Pemesanan Tiket</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Angkutan yang dipergunakan:</label>
                            <select class="form-control select2"  name="angkutan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Angkutan</option>
                                @foreach(pilih_angkutan() as $angkutan)
                                    <option value="{{$angkutan->id}}" @if($modalpegawai->angkutan_id==$angkutan->id) selected @endif> {{$angkutan->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Layanan Pemesanan Tiket:</label>
                            <select class="form-control select2"  name="jasa_perjalanan_id" style="width: 100%;" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Layanan</option>
                                @foreach(jasaperjalanan() as $jasa)
                                    <option value="{{$jasa->id}}" @if($modalpegawai->jasa_perjalanan_id==$jasa->id) selected @endif> {{$jasa->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h4 class="modal-title">Keterangan Surat Tugas</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Dasar:</label>
                            <textarea  class="form-control" id="dasar"  rows="4" name="dasar">{{$modalpegawai->dasar}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Maksud:</label>
                            <textarea  class="form-control" id="maksud" rows="4" name="maksud">{{$modalpegawai->maksud}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Catatan:</label>
                            <textarea  class="form-control" id="catatan" rows="4" name="catatan">{{$modalpegawai->catatan}}</textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="person{{$modalpegawai->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Detail Surat Tugas</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="detailmyform{{$modalpegawai->id}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$modalpegawai->id}}" name="surat_tugas_id">
                    <input type="hidden" id="jenis_sppd_id{{$modalpegawai->id}}" value="{{$modalpegawai->jenis_sppd_id}}" name="jenis_sppd_id">
                    <input type="hidden" id="angkutan_id{{$modalpegawai->id}}" value="{{$modalpegawai->angkutan_id}}" name="angkutan_id">
                    <input type="hidden" id="tujuan_sppd_id{{$modalpegawai->id}}" value="{{$modalpegawai->tujuan_sppd_id}}" name="angkutan_id">
                    <table width="100%" border="1" >
                        <tr>
                            <td class="ttd" width="5%">No</td>
                            <td class="ttd">Pegawai</td>
                            <td class="ttd" width="13%">Transport</td>
                            <td class="ttd" width="13%">Harian</td>
                            <td class="ttd" width="13%">Resepresentasi</td>
                            <td class="ttd" width="13%">Penginapan</td>
                        
                        </tr>
                        @for($x=0;$x<$modalpegawai->jumlah;$x++)
                        <tr>
                            <td class="ttd" align="center">{{$x+1}}</td>
                            <td class="ttd">
                                <select class="form-control select2" onchange="cekbiaya(this.value,{{$modalpegawai->id}},{{$x}})" name="pegawai_id[]" style="width: 100%;" data-select2-id="{{$modalpegawai->id}}{{$x}}" tabindex="-1" aria-hidden="true">
                                    <option value="">Pilih Pegawai</option>
                                    @foreach(pegawai() as $pegawai)
                                        <option value="{{$pegawai->id}}" {{$pegawai_id->shift()['selected']}}  > {{$pegawai->nama}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="ttd">
                                <input type="text" readonly name="transportasi[]" value="{{$transportasi->shift()['transportasi']}}" id="transportasi{{$modalpegawai->id}}{{$x}}" class="form-control">
                            </td>
                            <td class="ttd">
                                <input type="text" readonly name="harian[]" value="{{$harian->shift()['harian']}}" id="harian{{$modalpegawai->id}}{{$x}}" class="form-control">
                            </td>
                            <td class="ttd">
                                <input type="text" readonly name="representasi[]" value="{{$representasi->shift()['representasi']}}" id="representasi{{$modalpegawai->id}}{{$x}}" class="form-control">
                            </td>
                            <td class="ttd">
                                <input type="text" readonly name="penginapan[]" value="{{$penginapan->shift()['penginapan']}}" id="penginapan{{$modalpegawai->id}}{{$x}}" class="form-control">
                                <input type="hidden" readonly name="id[]" value="{{$id->shift()['id']}}" class="form-control">
                            </td>
                        </tr>
                        @endfor
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                <button type="button" id="simpan_detail{{$modalpegawai->id}}" Onclick="simpan_data_detail({{$modalpegawai->id}})" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="modalreplay">
    <div class="modal-dialog modal-lg" style="width:85%">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Surat Tugas</h4>
            </div>
            <form method="post" id="myform" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div id="alertnya" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="md-kiri">
                        <h4 class="modal-title">Informasi Surat Tugas</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Tanggal Surat:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_surat" class="form-control pull-right" id="datepickers">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tugas:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_mulai" class="form-control pull-right" id="datepickers1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_sampai" class="form-control pull-right" id="datepickers2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat:</label>
                            <input type="text" readonly class="form-control" id="nomor_surat" value="{{nomor()}}" name="nomor_surat">
                        </div>
                        <div class="form-group">
                            <label>Judul Surat:</label>
                            <input type="text" class="form-control" id="judul_surat" name="judul_surat">
                        </div>
                        <div class="form-group">
                            <label>Nomor SPPD:</label>
                            <input type="text" class="form-control" id="nomor_sppd" name="nomor_sppd">
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan:</label>
                            <select class="form-control select2" onchange="carijumlah_(this.value)" name="kegiatan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Kegiatan</option>
                                @foreach(kegiatan() as $kegiatan)
                                    <option value="{{$kegiatan->id}}"> {{$kegiatan->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pegawai:</label>
                            <input type="text" readonly class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label>Pejabat Berwenang:</label>
                            <select class="form-control select2"  name="pejabat_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Pejabat</option>
                                @foreach(pilih_employe() as $employe)
                                    <option value="{{$employe->id}}"> {{$employe->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis SPPD:</label>
                            <select class="form-control select2" onchange="caritujuan(this.value)" name="jenis_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Jenis SPPD</option>
                                @foreach(pilih_jenis_sppd() as $sppd)
                                    <option value="{{$sppd->id}}"> {{$sppd->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan SPPD:</label>
                            <select class="form-control select2" id="tujuan"  name="tujuan_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Tujuan</option>
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Dalam rangka Kunjungan Kerja:</label>
                            <input type="text"  class="form-control" id="kunjungan"  name="kunjungan">
                        </div>
                        <div class="form-group">
                            <label>Tempat Tujuan:</label>
                            <input type="text"  class="form-control" id="tujuan" name="tujuan">
                        </div>
                        
                        
                        <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                        <button type="button" id="simpan" Onclick="simpan_data_()" class="btn btn-primary pull-left">Simpan</button>
                    </div>
                    <div class="md-kanan">
                        <h4 class="modal-title">Angkutan dan Layanan Pemesanan Tiket</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Angkutan yang dipergunakan:</label>
                            <select class="form-control select2"  name="angkutan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Angkutan</option>
                                @foreach(pilih_angkutan() as $angkutan)
                                    <option value="{{$angkutan->id}}"> {{$angkutan->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Layanan Pemesanan Tiket:</label>
                            <select class="form-control select2"  name="jasa_perjalanan_id" style="width: 100%;" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                <option value="">Pilih Layanan</option>
                                @foreach(jasaperjalanan() as $jasa)
                                    <option value="{{$jasa->id}}"> {{$jasa->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h4 class="modal-title">Keterangan Surat Tugas</h4><hr style="border-top: 1px solid #d2aeae;margin-top: 10px;margin-bottom: 15px;">
                        <div class="form-group">
                            <label>Dasar:</label>
                            <textarea  class="form-control" id="dasar"  rows="4" name="dasar"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Maksud:</label>
                            <textarea  class="form-control" id="maksud" rows="4" name="maksud"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Catatan:</label>
                            <textarea  class="form-control" id="catatan" rows="4" name="catatan"></textarea>
                        </div>
                        
                    </div>
                </div>
                    
                <div class="modal-footer" style="width:100%">
                    
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="notifikasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning</h4>
            </div>
            <div class="modal-body">
                <div id="alertnyas" style="padding:10px;background:#dfdff7;font-weight:bold;text-align:center">
                    <h4>Sukses Tersimpan</h4>
                </div>
            </div>
            <div class="modal-footer">
            <span  class="btn btn-default pull-left" onclick="close_notif()">Close</span>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="notifikasidelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Warning</h4>
            </div>
            <div class="modal-body">
                <div id="alertnyas" style="padding:10px;background:#dfdff7;font-weight:bold;text-align:center">
                    <h4>Sukses Terhapus</h4>
                </div>
            </div>
            <div class="modal-footer">
            <span  class="btn btn-default pull-left" data-dismiss="modal">Close</span>
            </div>
        </div>
    </div>
</div>
@foreach($alert as $no=>$alert)
    
    @push('datepicker')
    <script>
        $('#datepicker1{{$alert->id}}').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#datepicker2{{$alert->id}}').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#datepicker3{{$alert->id}}').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
    <script>
        $( document ).ready(function() {
            $("#alertnya{{$alert->id}}").hide();
        });

        $('#datepickerok{{$alert->id}}').datepicker({
            format: 'yyyy-mm-dd'
        });

        
    </script>
    @endpush
@endforeach
@push('datatable')

<script>

function close_notif(){
    window.location.assign("{{url('/surat_tugas/')}}");
}
function cari_data(){
    var mulai=$('#datepicker1').val();
    var sampai=$('#datepicker2').val();
    window.location.assign("{{url('/surat_tugas/report/report')}}?mulai="+mulai+"&sampai="+sampai);
}

function print(){
    var mulai=$('#datepicker1').val();
    var sampai=$('#datepicker2').val();
    window.open("{{url('/surat_tugas/pdf/surat_tugas')}}?mulai="+mulai+"&sampai="+sampai,"_blank");
}
function download(){
    window.location.assign("{{url('/golongan/pdf/download')}}");
}

function reload(){
    location.reload();
}

function caritujuan(a){
    
    $("#tujuan").load("{{url('/surat_tugas/tujuan/')}}/"+a);
}
function cekcaritujuan(a,b){
    $("#tujuan"+b).load("{{url('/surat_tugas/tujuan/')}}/"+a);
}
function cetak_sppd(a){
    window.location.assign("{{url('/surat_tugas/pdf/sppd/')}}/"+a);
}
function cetak_kwitansi(a){
    window.location.assign("{{url('/surat_tugas/pdf/kwitansi/')}}/"+a);
}
function detail(a){
    window.location.assign("{{url('/surat_tugas/detail/')}}/"+a);
}

function delete_data(a){
    $.ajax({
        type: 'GET',
        url: "{{url('/golongan/delete/')}}/"+a,
        data: 'id='+a,
        success: function(msg){
            
            window.location.assign("{{url('/golongan/hapus')}}");
            
        }
    });
}

function cekbiaya(z,a,b){
    var jenis_sppd_id=$("#jenis_sppd_id"+a).val();
    var angkutan_id=$("#angkutan_id"+a).val();
    var tujuan_sppd_id=$("#tujuan_sppd_id"+a).val();
    //alert(tujuan_sppd_id);
    $.ajax({
        type: 'GET',
        url: "{{url('/surat_tugas/ceknilai/')}}/"+z+"/"+jenis_sppd_id+"/"+angkutan_id+"/"+tujuan_sppd_id,
        data: 'a=1',
        success: function(msg){
            nilai=msg.split("-");
            $('#transportasi'+a+''+b).val(nilai[0]);
            $('#harian'+a+''+b).val(nilai[1]);
            $('#representasi'+a+''+b).val(nilai[2]);
            $('#penginapan'+a+''+b).val(nilai[3]);
            
        }
    });
    //alert(a);
    
}

function carijumlah_(a){
    
    $.ajax({
        type: 'GET',
        url: "{{url('/surat_tugas/cari/')}}/"+a,
        data: 'id='+a,
        success: function(msg){
            
            $('#jumlah').val(msg);
           
        }
    });
}
function carijumlah(a,b){
    
    $.ajax({
        type: 'GET',
        url: "{{url('/surat_tugas/cari/')}}/"+a,
        data: 'id='+a,
        success: function(msg){
            
            $('#jumlah'+b).val(msg);
           
        }
    });
}
  $(function () {
    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    })
  })
</script>
<script>
//$('#notifikasi').modal({ keyboard: true })
    $( document ).ready(function() {
        $('#alertnya').hide();
    });
    @if($notif=='sukses')
        $('#notifikasi').modal({
    		backdrop: 'static',
    		keyboard: false});
    @endif

    @if($notif=='hapus')
        $('#notifikasidelete').modal("toggle");
    @endif

   
    // $(document).ready(function(){
	//     $('#modalreplay').click(function(){
    //         $('#modalreplay').modal({
    //             backdrop: 'static',
    //             keyboard: false
    //         });
	//     });
    // });
    function simpan_data_(){
        var form=document.getElementById('myform');
        $.ajax({
          type: 'POST',
          url: "{{url('/surat_tugas/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/surat_tugas/sukses')}}");
            }else{
              $('#alertnya').show();
              $('#alertnya').html(msg);
              $("#simpan").removeAttr("disabled");
            }
            
          }
        });
        //alert('dfdsfsd');
    }

    function simpan_data_detail(a){
        var form=document.getElementById('detailmyform'+a);
       
        $.ajax({
          type: 'POST',
          url: "{{url('/surat_tugas/save_detail')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan_detail'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/surat_tugas/sukses')}}");
            }else{
              $('#alertnya'+a).show();
              $('#alertnya'+a).html(msg);
              $("#simpan_detail"+a).removeAttr("disabled");
            }
            
            
          }
        });
    }
    function simpan_data(a){
        var form=document.getElementById('myform'+a);
        $.ajax({
          type: 'POST',
          url: "{{url('/surat_tugas/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/surat_tugas/sukses')}}");
            }else{
              $('#alertnya'+a).show();
              $('#alertnya'+a).html(msg);
              $("#simpan"+a).removeAttr("disabled");
            }
            
          }
        });
        //alert('dfdsfsd');
    }

    
    function delete_group(){
        var form=document.getElementById('formdelete');
        $.ajax({
			type: 'POST',
			url: "{{url('/group/delete')}}",
			data: new FormData(form),
			contentType: false,
			cache: false,
			processData:false,
			success: function(msg){
				window.location.assign("{{url('/group')}}");
				
			}
		});
    }

    function edit_group(a){
        var form=document.getElementById('save'+a);
        $.ajax({
			type: 'POST',
			url: "{{url('/group/update')}}/"+a,
			data: new FormData(form),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('#simpan'+a).attr("disabled","disabled");
			},
			success: function(msg){
				if(msg=='ok'){
					window.location.assign("{{url('/guru/suksess')}}");
				}else{
					$('#alert'+a).show();
					$('#alert'+a).html(msg);
					$("#simpan"+a).removeAttr("disabled");
				}
				
			}
		});
    }
</script>
@endpush
@endsection