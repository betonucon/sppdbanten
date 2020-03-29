@extends('html.app')
<style>
    .dataTables_filter{
        float:right;
    }
    td{
        font-size: 13px;
        padding:6px;
    }
    th{
        font-size: 13px;
       
    }
    .tth{
        font-size: 13px;
        padding:6px;
        background:aqua;
    }
    .ttd{
        font-size: 13px;
        padding:6px;
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
                        
                            <span  data-toggle="modal" data-target="#modalreplay" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></span>
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
                                <th>Keterangan</th>
                                <th>Role</th>
                                <th width="5%">App</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $no=>$user)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>App/Laravel</td>
                                    <td>{{$user->name}}</td>
                                    <td><span  data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#modalapp{{$user->id}}" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></span></td>
                                    <td>
                                        <div class="btn-group">
                                            <span  class="btn btn-default btn-sm" onclick="delete_data({{$user->id}})"><i class="fa fa-trash-o"></i></span>
                                            <span  data-toggle="modal" data-target="#modalreplay{{$user->id}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></span>
                                        </div>
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
@foreach($modaluser as $no=>$modalpegawai)
<div class="modal fade" id="modalreplay{{$modalpegawai->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Pegawai</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input typr="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Golongan:</label>
                        <input type="text" class="form-control" id="golongan" value="{{$modalpegawai->golongan}}" name="golongan">
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
<div class="modal fade" id="modalapp{{$modalpegawai->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Akses</h4>
            </div>
            <form method="post" id="myformroute{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <input type="hidden" name="role_id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <!-- <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div> -->
                    <table width="100%">
                        <tr>
                            <th class="tth" width="10%">NO</th>
                            <th class="tth" >Modul</th>
                            <th class="tth" width="15%">Permision</th>
                        </tr>
                        @foreach($rout as $routs)
                        <tr>
                            <td class="ttd"><input type="checkbox" value="{{$routs->id}}" {{$check->shift()['check']}} name="route_id[]"></td>
                            <td class="ttd">{{$routs->name}}</td>
                            <td class="ttd">
                                <select name="permision_id[]">
                                    @foreach(permision() as $permision)
                                        <option value="{{$permision->id}}" {{$hase->shift()['selected']}} >{{$permision->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                    <button type="button" id="simpan_route{{$modalpegawai->id}}" Onclick="simpan_route({{$modalpegawai->id}});" class="btn btn-primary pull-left">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="modalreplay">
    <div class="modal-dialog">
        <div class="modal-content">
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
                        <label>Golongan:</label>
                        <input type="text" class="form-control" id="golongan" name="golongan">
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
            <span  class="btn btn-default pull-left" onclick="close_notif()"  data-dismiss="modal">Close</span>
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
            <span  class="btn btn-default pull-left" onclick="close_notif()" data-dismiss="modal">Close</span>
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
    window.location.assign("{{url('/golongan/pdf/golongan')}}");
}

function download(){
    window.location.assign("{{url('/golongan/pdf/download')}}");
}

function reload(){
    location.reload();
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
    function close_notif(){
        window.location.assign("{{url('/user/')}}");
    }
    @if($notif=='sukses')
        $('#notifikasi').modal({
    		backdrop: 'static',
    		keyboard: false});
    @endif

    @if($notif=='hapus')
        $('#notifikasidelete').modal("toggle");
    @endif

    function simpan_data_(){
        var form=document.getElementById('myform');
        $.ajax({
          type: 'POST',
          url: "{{url('/golongan/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/golongan/sukses')}}");
            }else{
              $('#alertnya').show();
              $('#alertnya').html(msg);
              $("#simpan").removeAttr("disabled");
            }
            
          }
        });
        //alert('dfdsfsd');
    }

    function simpan_route(a){
        var form=document.getElementById('myformroute'+a);
        //alert(a);
        $.ajax({
          type: 'POST',
          url: "{{url('/user/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan_route'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/user/sukses')}}");
            }else{
              $("#simpan_route"+a).removeAttr("disabled");
              alert(msg);
            }
            
          }
        });
        //alert('dfdsfsd');
    }

    function simpan_data(a){
        var form=document.getElementById('myform'+a);
        $.ajax({
          type: 'POST',
          url: "{{url('/golongan/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/golongan/sukses')}}");
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