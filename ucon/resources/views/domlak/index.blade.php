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
                        @if(permision_ssh(Auth::user()->role_id)=='3' || permision_ssh(Auth::user()->role_id)=='2')
                            <span  data-toggle="modal" data-target="#modalreplay" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></span>
                        @endif   
                        
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" onclick="reload()"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                        
                        </div>
                        <!-- /.pull-right -->
                    </div>
                
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Jenis SPPD</th>
                                <th>Tujuan</th>
                                <th>Golongan</th>
                                <th>Transportasi</th>
                                <th>Uang Harian</th>
                                <th>Uang Reresentasi</th>
                                <th>Penginapan</th>
                                <th width="8%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domlak as $no=>$domlak)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{jenis_sppd($domlak->jenis_sppd_id)}}</td>
                                    <td>{{tujuan_sppd($domlak->tujuan_sppd_id)}}</td>
                                    <td>{{cekgolongan($domlak->golongan_id)}}</td>
                                    <td>Rp.{{$domlak->transportasi}}</td>
                                    <td>Rp.{{$domlak->uang_harian}}</td>
                                    <td>Rp.{{$domlak->uang_representasi}}</td>
                                    <td>Rp.{{$domlak->uang_penginapan}}</td>
                                    <td>
                                    @if(permision_ssh(Auth::user()->role_id)=='3' || permision_ssh(Auth::user()->role_id)=='2')
                                        <div class="btn-group">
                                            <span  class="btn btn-default btn-sm" onclick="delete_data({{$domlak->id}})"><i class="fa fa-trash-o"></i></span>
                                            <span  data-toggle="modal" data-target="#modalreplay{{$domlak->id}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    @endif
                                    </td>
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
@foreach($modaldomlak as $no=>$modalpegawai)
<div class="modal fade" id="modalreplay{{$modalpegawai->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form SSH</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Jenis SPPD:</label>
                        <select class="form-control select2" onchange="caritujuannew(this.value,{{$modalpegawai->id}})" name="jenis_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Jenis SPPD</option>
                            @foreach(pilih_jenis_sppd() as $sppd)
                                <option value="{{$sppd->id}}" @if($modalpegawai->jenis_sppd_id==$sppd->id) selected @endif > {{$sppd->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan SPPD:</label>
                        <select class="form-control select2" id="tujuan{{$modalpegawai->id}}" onchange="carijumlah(this.value)" name="tujuan_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            
                            @if($modalpegawai->tujuan_sppd_id!='')
                                <option value="{{$modalpegawai->tujuan_sppd_id}} ">{{tujuan_sppd($modalpegawai->tujuan_sppd_id)}}</option>
                            @else
                                <option value="">Pilih Tujuan</option>
                            @endif
                        </select>
                    </div>
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
                        <label>Golongan:</label>
                        <select class="form-control select2"  name="golongan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih golongan</option>
                            
                            @foreach(golongan() as $golongan)
                                <option value="{{$golongan->id}}" @if($modalpegawai->golongan_id==$golongan->id) selected @endif> {{$golongan->golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Transportasi:</label>
                        <input type="text" class="form-control" id="transportasi"  value="{{$modalpegawai->transportasi}}" name="transportasi">
                    </div>
                    <div class="form-group">
                        <label>Uang Harian:</label>
                        <input type="text" class="form-control" id="uang_harian"  value="{{$modalpegawai->uang_harian}}"  name="uang_harian">
                    </div>
                    <div class="form-group">
                        <label>Uang Repesentasi:</label>
                        <input type="text" class="form-control" id="uang_representasi"  value="{{$modalpegawai->uang_repesentasi}}"  name="uang_representasi">
                    </div>
                    <div class="form-group">
                        <label>Uang Penginapan:</label>
                        <input type="text" class="form-control" id="uang_penginapan"  value="{{$modalpegawai->uang_penginapan}}"  name="uang_penginapan">
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                    <button type="button" id="simpan{{$modalpegawai->id}}" Onclick="simpan_data({{$modalpegawai->id}});" class="btn btn-primary pull-left">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="modalreplay">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form SSH</h4>
            </div>
            <form method="post" id="myform" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div id="alertnya" style="padding:10px;background:#dfdff7;font-weight:bold">
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
                        <select class="form-control select2" id="tujuan" onchange="carijumlah(this.value)" name="tujuan_sppd_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Tujuan</option>
                            
                        </select>
                    </div>
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
                        <label>Golongan:</label>
                        <select class="form-control select2"  name="golongan_id" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih golongan</option>
                            @foreach(golongan() as $golongan)
                                <option value="{{$golongan->id}}"> {{$golongan->golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Transportasi:</label>
                        <input type="text" class="form-control" id="transportasi"  name="transportasi">
                    </div>
                    <div class="form-group">
                        <label>Uang Harian:</label>
                        <input type="text" class="form-control" id="uang_harian"  name="uang_harian">
                    </div>
                    <div class="form-group">
                        <label>Uang Repesentasi:</label>
                        <input type="text" class="form-control" id="uang_representasi"  name="uang_representasi">
                    </div>
                    <div class="form-group">
                        <label>Uang Penginapan:</label>
                        <input type="text" class="form-control" id="uang_penginapan"  name="uang_penginapan">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                    <button type="button" id="simpan" Onclick="simpan_data_()" class="btn btn-primary pull-left">Simpan</button>
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
            <span  class="btn btn-default pull-left" data-dismiss="modal">Close</span>
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
@push('datatable')
@foreach($alert as $no=>$alert)
    <script>
        $( document ).ready(function() {
            $("#alertnya{{$alert->id}}").hide();
        });

    </script>
@endforeach
<script>

function print(){
    window.location.assign("{{url('/employe/pdf/employe')}}");
}

function download(){
    window.location.assign("{{url('/employe/pdf/download')}}");
}

function reload(){
    location.reload();
}
function caritujuan(a){
    $("#tujuan").load("{{url('/domlak/tujuan/')}}/"+a);
}
function caritujuannew(a,b){
    $("#tujuan"+b).load("{{url('/domlak/tujuan/')}}/"+a);
}
function delete_data(a){
    $.ajax({
        type: 'GET',
        url: "{{url('/employe/delete/')}}/"+a,
        data: 'id='+a,
        success: function(msg){
            
            window.location.assign("{{url('/employe/hapus')}}");
            
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
    $( document ).ready(function() {
        $('#alertnya').hide();
    });
    @if($notif=='sukses')
        $('#notifikasi').modal("toggle");
    @endif

    @if($notif=='hapus')
        $('#notifikasidelete').modal("toggle");
    @endif

    function simpan_data_(){
        var form=document.getElementById('myform');
        $.ajax({
          type: 'POST',
          url: "{{url('/domlak/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/domlak/sukses')}}");
            }else{
              $('#alertnya').show();
              $('#alertnya').html(msg);
              $("#simpan").removeAttr("disabled");
            }
            
          }
        });
        //alert('dfdsfsd');
    }

    function simpan_data(a){
        var form=document.getElementById('myform'+a);
        $.ajax({
          type: 'POST',
          url: "{{url('/domlak/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/domlak/sukses')}}");
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