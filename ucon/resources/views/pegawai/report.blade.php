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
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Pangkat</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $no=>$pegawai)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$pegawai->nama}}</td>
                                    <td>{{$pegawai->nip}}</td>
                                    <td>{{$pegawai->pangkat}}</td>
                                    <td>{{$pegawai->golongan}}</td>
                                    <td>{{$pegawai->jabatan}}</td>
                                    
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
@foreach($modalpegawai as $no=>$modalpegawai)
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
                <input type="hidden" name="id" value="{{$modalpegawai->id}}">
                <div class="modal-body">
                    <div id="alertnya{{$modalpegawai->id}}" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{$modalpegawai->nip}}">
                    </div>
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$modalpegawai->nama}}">
                    </div>
                    <div class="form-group">
                        <label>Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$modalpegawai->jabatan}}">
                    </div>
                    <div class="form-group">
                        <label>Pangkat:</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" value="{{$modalpegawai->pangkat}}">
                    </div>
                    <div class="form-group">
                        <label>No Rekening:</label>
                        <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="{{$modalpegawai->nomor_rekening}}">
                    </div>
                    <div class="form-group">
                        <label>Golongan:</label>
                        <select class="form-control select2" name="golongan" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Golongan</option>
                            @foreach(golongan() as $golongan)
                                <option value="{{$golongan->golongan}}" @if($modalpegawai->golongan==$golongan->golongan) selected @endif>Golongan {{$golongan->golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <select class="form-control select2" name="status" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="1" @if($modalpegawai->status==1) selected @endif>Aktif</option>
                            <option value="0" @if($modalpegawai->status==2) selected @endif>Non Aktif</option>
                            
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Replay</label>

                        <div class="input-group">
                            <textarea id="editor1" name="editor1" rows="20" cols="80"></textarea>
                        </div>
                    </div> -->
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Pegawai</h4>
            </div>
            <form method="post" id="myform" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div id="alertnya" style="padding:10px;background:#dfdff7;font-weight:bold">
                    </div>
                    <div class="form-group">
                        <label>NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="form-group">
                        <label>Pangkat:</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat">
                    </div>
                    <div class="form-group">
                        <label>No Rekening:</label>
                        <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening">
                    </div>
                    <div class="form-group">
                        <label>Golongan:</label>
                        <select class="form-control select2" name="golongan" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                            <option value="">Pilih Golongan</option>
                            @foreach(golongan() as $golongan)
                                <option value="{{$golongan->golongan}}">Golongan {{$golongan->golongan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <select class="form-control select2" name="status" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                            
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Replay</label>

                        <div class="input-group">
                            <textarea id="editor1" name="editor1" rows="20" cols="80"></textarea>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tutup</button>
                    <button type="button" id="simpan" Onclick="simpan_data();" class="btn btn-primary pull-left">Simpan</button>
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

        function print(){
            window.location.assign("{{url('/pegawai/pdf/pegawai')}}","_blank");
        }

        function download(){
            window.location.assign("{{url('/pegawai/pdf/download')}}");
        }

        function reload(){
            location.reload();
        }

        function delete_data(a){
            $.ajax({
                type: 'GET',
                url: "{{url('/pegawai/delete/')}}/"+a,
                data: 'id='+a,
                success: function(msg){
                   
                    window.location.assign("{{url('/pegawai/hapus')}}");
                    
                }
            });
        }
    </script>
@endforeach
<script>
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

    function simpan_data(){
        var form=document.getElementById('myform');
        $.ajax({
          type: 'POST',
          url: "{{url('/pegawai/save/new')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan').attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/pegawai/sukses')}}");
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
          url: "{{url('/pegawai/save/edit')}}",
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
            $('#simpan'+a).attr("disabled","disabled");
          },
          success: function(msg){
            if(msg=='ok'){
                window.location.assign("{{url('/pegawai/sukses')}}");
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