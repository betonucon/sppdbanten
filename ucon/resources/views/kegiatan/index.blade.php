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
                        @if(permision_kegiatan(Auth::user()->role_id)=='3' || permision_kegiatan(Auth::user()->role_id)=='2')
                            <span  data-toggle="modal" data-target="#modalreplay" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></span>
                        @endif
                            <span  class="btn btn-success btn-sm" onclick="print()"><i class="fa fa-print"></i></span>
                            <span  class="btn btn-default btn-sm" onclick="download()"><i class="fa fa-download"></i></span>
                            
                        
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
                                <th>Nama Kegiatan</th>
                                <th>Jumlah</th>
                                <th>Kode Rekening</th>
                                <th>Author</th>
                                <th width="8%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatan as $no=>$kegiatan)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$kegiatan->title}}</td>
                                    <td>{{$kegiatan->jumlah}}</td>
                                    <td>{{$kegiatan->kode_rekening}}</td>
                                    <td>{{author($kegiatan->users_id)}}</td>
                                    <td>
                                    @if(permision_kegiatan(Auth::user()->role_id)=='3' || permision_kegiatan(Auth::user()->role_id)=='2')
                                        <div class="btn-group">
                                            <span  class="btn btn-default btn-sm" onclick="delete_data({{$kegiatan->id}})"><i class="fa fa-trash-o"></i></span>
                                            <span  data-toggle="modal" data-target="#modalreplay{{$kegiatan->id}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></span>
                                        </div>
                                    @else
                                        No Akses
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
@foreach($modalkegiatan as $no=>$modalpegawai)
<div class="modal fade" id="modalreplay{{$modalpegawai->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Kegiatan</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Nama Kegiatan:</label>
                        <input type="text" class="form-control" id="title" value="{{$modalpegawai->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label>Kode Rekening:</label>
                        <input type="text" class="form-control" id="kode_rekening" value="{{$modalpegawai->kode_rekening}}" name="kode_rekening">
                    </div>
                    <div class="form-group">
                        <label>Jumlah:</label>
                        <select class="form-control select2" name="jumlah" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Jumlah</option>
                            @for($x=1;$x<40;$x++)
                                <option value="{{$x}}" @if($modalpegawai->jumlah==$x) selected @endif> {{$x}} Pegawai</option>
                            @endfor
                        </select>
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
            <h4 class="modal-title">Form Golongan</h4>
            </div>
            <form method="post" id="myform" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div id="alertnya" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Nama Kegiatan:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label>Kode Rekening:</label>
                        <input type="text" class="form-control" id="kode_rekening" name="kode_rekening">
                    </div>
                    <div class="form-group">
                        <label>Jumlah:</label>
                        <select class="form-control select2" name="jumlah" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Jumlah</option>
                            @for($x=1;$x<40;$x++)
                                <option value="{{$x}}"> {{$x}} Pegawai</option>
                            @endfor
                        </select>
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
    window.location.assign("{{url('/kegiatan/pdf/kegiatan')}}","_blank");
}

function download(){
    window.location.assign("{{url('/kegiatan/pdf/download')}}");
}

function reload(){
    location.reload();
}

function delete_data(a){
    $.ajax({
        type: 'GET',
        url: "{{url('/kegiatan/delete/')}}/"+a,
        data: 'id='+a,
        success: function(msg){
            
            window.location.assign("{{url('/kegiatan/hapus')}}");
            
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
          url: "{{url('/kegiatan/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/kegiatan/sukses')}}");
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
          url: "{{url('/kegiatan/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/kegiatan/sukses')}}");
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