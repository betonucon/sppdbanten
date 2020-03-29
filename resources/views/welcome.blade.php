@extends('html.app')
<style>
    .dataTables_filter{
        float:right;
    }
    td{
        font-size: 11px;
    }
    th{
        font-size: 11px;
    }
</style>
@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
            
          

          <div class="box">
            <div class="box-body">
                  
                    <div class="mailbox-controls" style="background:#d6d6e3;margin-bottom:10px">
                        <!-- Check all button -->
                        <div class="btn-group">
                            <select name="bulan" id="bulan">
                                @for($x=1;$x<=12;$x++)
                                  @if($x>9)
                                    <option value="{{$x}}">{{bulan($x)}}</option>
                                  @else
                                    <option value="{{'0'.$x}}">{{bulan('0'.$x)}}</option>
                                  @endif
                                @endfor
                            </select>
                            <select name="tahun" id="tahun">
                                @for($s=2019;$s<=date('Y');$s++)
                                  <option value="{{$s}}">{{$s}}</option>
                                @endfor
                            </select>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" onclick="cari_data()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                        
                        </div>
                        <!-- /.pull-right -->
                    </div>
                
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="20%">Nama</th>
                                <th>Nip</th>
                                @for($t=1;$t<=31;$t++)
                                  <th width="2%" style="padding:1px">{{$t}}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $no=>$data)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nip}}</td>
                                    @for($t=1;$t<=31;$t++)
                                        {!!$cekdata->shift()['ceek']!!}
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                
            </div>
            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
<div class="modal fade" id="modalreplay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Forum</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Replay</label>

                    <div class="input-group">
                        <textarea id="editor1" name="editor1" rows="20" cols="80"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('datatable')
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  function cari_data(){
    var bulan=$('#bulan').val();
    var tahun=$('#tahun').val();
    window.location.assign("{{url('/home/')}}/"+bulan+"/"+tahun);
  }
</script>

@endpush
@endsection