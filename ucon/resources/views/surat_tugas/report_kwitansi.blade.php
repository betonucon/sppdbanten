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
                                <th width="5%">KWT</th>
                                <th width="5%">SPM</th>
                                <th width="5%">RBPD</th>
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
                                    <td><span  class="btn btn-default btn-sm" onclick="cetak_kwitansi({{$data->id}})"><i class="fa fa-print"></i></span></td>
                                    <td><span  class="btn btn-default btn-sm" onclick="cetak_spm({{$data->id}})"><i class="fa fa-print"></i></span></td>
                                    <td><span  class="btn btn-default btn-sm" onclick="cetak_rpbd({{$data->id}})"><i class="fa fa-print"></i></span></td>
                                   
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
    <div class="modal-dialog modal-lg" style="width:85%" >
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Kwitansi #{{$modalpegawai->nomor_surat}}</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                   
                        <div class="form-group">
                            <label>Tanggal Kwitansi:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{$modalpegawai->date_kwitansi}}" name="date_kwitansi" class="form-control pull-right" id="datepicker1{{$modalpegawai->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{$modalpegawai->date_terima}}" name="date_terima" class="form-control pull-right" id="datepicker2{{$modalpegawai->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Kwitansi:</label>
                            <input type="text"  value="{{$modalpegawai->nomor_kwitansi}}" class="form-control" id="nomor_kwitansi"  name="nomor_kwitansi">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening:</label>
                            <input type="text"  value="{{$modalpegawai->nomor_rekening}}" class="form-control" id="nomor_rekening" name="nomor_rekening">
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat:</label>
                            <input type="text" readonly value="{{$modalpegawai->nomor_surat}}" class="form-control" id="nomor_surat" value="{{nomor()}}" name="nomor_surat">
                        </div>
                        <div class="form-group">
                            <label>Judul Surat:</label>
                            <input type="text"readonly  value="{{$modalpegawai->judul_surat}}" class="form-control" id="judul_surat" name="judul_surat">
                        </div>
                        <div class="form-group">
                            <label>Nomor SPPD:</label>
                            <input type="text" readonly value="{{$modalpegawai->nomor_sppd}}" class="form-control" id="nomor_sppd" name="nomor_sppd">
                        </div>
                        <div class="form-group">
                            <label>Kegiatan:</label>
                            <input type="text" readonly value="{{cek_kegiatan($modalpegawai->kegiatan_id)}}" class="form-control" id="nomor_sppd" name="nomor_sppd">
                        </div>
                        
                        <div class="form-group">
                            <label>Pejabat Berwenang:</label>
                            <input type="text" readonly class="form-control" value="{{pejabat($modalpegawai->pejabat_id)['name']}}" id="jumlah{{$modalpegawai->id}}" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label>Bendahara:</label>
                            <input type="text" readonly class="form-control" value="{{bendahara()['name']}}" id="jumlah{{$modalpegawai->id}}" name="jumlah">
                        </div>
                        <table width="100%" border="1" >
                            <tr>
                                <td class="ttd" width="5%">No</td>
                                <td class="ttd">Pegawai</td>
                                <td class="ttd" width="9%">Golongan</td>
                                <td class="ttd" width="9%">Transport</td>
                                <td class="ttd" width="9%">Harian</td>
                                <td class="ttd" width="9%">Resepresen</td>
                                <td class="ttd" width="9%">Penginapan</td>
                                @if($modalpegawai->angkutan_id==1)
                                <td class="ttd" width="9%">H Berangkat</td>
                                <td class="ttd" width="9%">H Kembali</td>
                                @endif
                            
                            </tr>
                            @foreach($detaildata->where('surat_tugas_id',$modalpegawai->id) as $detaildata)
                            <tr>
                                <td class="ttd" align="center">{{$detaildata->urut+1}}</td>
                                <td class="ttd">
                                    <input type="text" readonly style="width:100%;padding:5px;background:aqua;border:solid 1px aqua;" readonly  value="{{cekpegawai($detaildata->pegawai_id)['nama']}}" >
                                </td>
                                <td class="ttd">
                                    <input type="text" readonly style="width:100%;padding:5px;background:aqua;border:solid 1px aqua" readonly  value="{{cekpegawai($detaildata->pegawai_id)['golongan']}}" >
                                </td>
                                <td class="ttd">
                                    <input type="text" style="width:100%;padding:5px"  name="transportasi[]" value="{{$detaildata->transportasi}}" >
                                </td>
                                <td class="ttd">
                                    <input type="text" style="width:100%;padding:5px"  name="uang_harian[]" value="{{$detaildata->uang_harian}}">
                                </td>
                                <td class="ttd">
                                    <input type="text" style="width:100%;padding:5px"  name="uang_representasi[]" value="{{$detaildata->uang_harian}}">
                                </td>
                                <td class="ttd">
                                    <input type="text" style="width:100%;padding:5px"  name="uang_penginapan[]" value="{{$detaildata->uang_penginapan}}">
                                    <input type="hidden" readonly name="detail_id[]" value="{{$detaildata->id}}">
                                </td>
                                @if($modalpegawai->angkutan_id==1)
                                    
                                    <td class="ttd">
                                        <input type="text" style="width:100%;padding:5px" name="harga_berangkat[]" value="{{$detaildata->harga_berangkat}}">
                                    </td>
                                    <td class="ttd">
                                        <input type="text" style="width:100%;padding:5px" name="harga_kembali[]" value="{{$detaildata->harga_kembali}}">
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                        
                        <br>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
                        <button type="button" id="simpan{{$modalpegawai->id}}" Onclick="simpan_data({{$modalpegawai->id}});" class="btn btn-primary " style="margin-left:10px">Simpan</button>
                    
                </div>
                <div class="modal-footer">
                    
                </div>
            </form>
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


@push('datepicker')
<script>
    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#datepicker3').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
@endpush
@push('datatable')

<script>

function cari_data(){
    var mulai=$('#datepicker1').val();
    var sampai=$('#datepicker2').val();
    window.location.assign("{{url('/surat_tugas/report_kwitansi/ok')}}?mulai="+mulai+"&sampai="+sampai);
}

function print(){
    var mulai=$('#datepicker1').val();
    var sampai=$('#datepicker2').val();
    window.open("{{url('/surat_tugas/pdf/report_kwitansi_nya')}}?mulai="+mulai+"&sampai="+sampai,"_blank");
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
    window.open("{{url('/surat_tugas/pdf/kwitansi/')}}/"+a,"_blank");
}
function cetak_spm(a){
    window.open("{{url('/surat_tugas/pdf/kwitansi_spm/')}}/"+a,"_blank");
}
function cetak_rpbd(a){
    window.open("{{url('/surat_tugas/pdf/kwitansi_rpbd/')}}/"+a,"_blank");
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
          url: "{{url('/surat_tugas/save/kwitansi/detail')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/surat_tugas/kwitansi/suksess')}}");
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