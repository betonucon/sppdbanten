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
                <div class="box-body" style="background:#7acbcc;text-align: center;">
                <img src="{{url('/img/error.jpg')}}" width="70%" height="400px"> 
                </div> 
            </div> 
         </div>
      </div>
</section>

@push('datatable')
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
@endpush
@endsection