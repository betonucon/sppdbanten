@extends('html.app')
<style>
    .dataTables_filter{
        float:right;
    }
    td{
        font-size: 13px;
        padding:7px;
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
                        @if(cek_permision_role(7)=='All' || cek_permision_role(7)=='Create')
                            <span  data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#modalreplay" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></span>
                            
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Akses</th>
                                <th>Role</th>
                            
                                <th width="8%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employe as $no=>$employe)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$employe->nip}}</td>
                                    <td>{{$employe->name}}</td>
                                    <td>{{users($employe->nip)->email}}</td>
                                    <td>{{akses($employe->akses)}}</td>
                                    <td>{{role($employe->role_id)->name}}</td>
                                   
                                    <td>
                                    @if(cek_permision_role(7)=='All' || cek_permision_role(7)=='Create')
                                        <div class="btn-group">
                                            <span  class="btn btn-default btn-sm" onclick="delete_data({{$employe->id}})"><i class="fa fa-trash-o"></i></span>
                                            <span  data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#modalreplay{{$employe->id}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></span>
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
@foreach($modalemploye as $no=>$modalpegawai)
<div class="modal fade" id="modalreplay{{$modalpegawai->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Akses</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="name" value="{{$modalpegawai->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" id="nip" value="{{$modalpegawai->nip}}" name="nip">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" id="email" value="{{users($modalpegawai->nip)->email}}" name="email">
                    </div>
                    <div class="form-group">
                        <label>Akses:</label>
                        <select class="form-control select2" name="akses" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Akses</option>
                            @foreach(pilih_akses() as $akses)
                                <option value="{{$akses->id}}" @if($modalpegawai->akses==$akses->id) selected @endif >{{$akses->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Role Akses:</label>
                        <select class="form-control select2" name="role_id" style="width: 100%;" data-select2-id="10" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Role</option>
                            @foreach(pilih_role() as $role)
                                <option value="{{$role->id}}" @if($modalpegawai->role_id==$role->id) selected @endif>{{$role->name}}</option>
                            @endforeach
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

<div class="modal fade" id="modalapp{{$modalpegawai->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Akses</h4>
            </div>
            <form method="post" id="myform{{$modalpegawai->id}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <table width="100%">
                        <tr>
                            <td width="10%">NO</td>
                            <td >Modul</td>
                        </tr>
                        <tr>
                            <td ><input type="checkbox" name="route_id"></td>
                            <td >Modul</td>
                        </tr>
                    </table>
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
            <h4 class="modal-title">Form Akses</h4>
            </div>
            <form method="post" id="myform" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div id="alertnya" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Akses:</label>
                        <select class="form-control select2" name="akses" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Akses</option>
                            @foreach(pilih_akses() as $akses)
                                <option value="{{$akses->id}}">{{$akses->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Role Akses:</label>
                        <select class="form-control select2" name="role_id" style="width: 100%;" data-select2-id="10" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Role</option>
                            @foreach(pilih_role() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
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
    window.location.assign("{{url('/employe/pdf/employe')}}");
}

function download(){
    window.location.assign("{{url('/employe/pdf/download')}}");
}

function reload(){
    location.reload();
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
          url: "{{url('/employe/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/employe/sukses')}}");
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
          url: "{{url('/employe/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/employe/sukses')}}");
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