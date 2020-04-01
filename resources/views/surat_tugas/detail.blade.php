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
<div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
        
        <h2 style="display:inline"><img src="{{url('/img/serang.png')}}" width="30px" height="40px"> SURAT TUGAS /# {{$data->nomor_surat}}</h2>
    </div>
</div>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Nomor SPPD : {{$data->nomor_sppd}} /{{$data->judul_surat}}
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Yang Berwewenang</strong><br>
            {{pejabat($data->pejabat_id)->name}}<br><br>
            <strong>Kegiatan</strong><br>
            {{cek_kegiatan($data->kegiatan_id)}}<br><br>
            <strong>Jenis SPPD</strong><br>
            {{jenis_sppd($data->jenis_sppd_id)}}<br><br>
            <strong>Lokasi SPPD</strong><br>
            {{tujuan_sppd($data->tujuan_sppd_id)}}<br><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Tanggal Surat Tugas</strong><br>
            {{tanggal($data->date_surat)}}<br><br>
            <strong>Mulai Dari</strong><br>
            {{tanggal($data->date_mulai)}}<br><br>
            <strong>Sampai Dengan</strong><br>
            {{tanggal($data->date_sampai)}}<br><br>
            <strong>Jumlah Hari</strong><br>
            {{$data->selisih}} Hari<br><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <address>
                <strong>Kendaraan Yang Digunakan</strong><br>
                {{angkutan($data->angkutan_id)}}<br><br>
                <strong>Jumlah Pegawai</strong><br>
                {{$data->jumlah}} Pegawai<br><br>
                <strong>Sampai Dengan</strong><br>
                {{tanggal($data->date_sampai)}}<br><br>
            </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Transport</th>
              <th>Harian</th>
              <th>Representasi</th>
              <th>Penginapan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detail as $detail)
            <tr>
              <td>{{$detail->urut+1}}</td>
              <td>{{cekpegawai($detail->pegawai_id)['nama']}}</td>
              <td>{{cekpegawai($detail->pegawai_id)['nip']}}</td>
              <td>{{cekpegawai($detail->pegawai_id)['golongan']}}</td>
              <td>Rp.{{$detail->transportasi}} </td>
              <td>Rp.{{$detail->uang_harian}} </td>
              <td>Rp.{{$detail->uang_representasi}} </td>
              <td>Rp.{{$detail->uang_penginapan}} </td>
            </tr>
            @endforeach
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Jasa Perjalanan:</p>
          <img src="{{url('/img/'.cekjasaperjalanan($data->jasa_perjalanan_id)->icon_gambar)}}" width="48px" height="32px" alt="{{cekjasaperjalanan($data->jasa_perjalanan_id)->name}}">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <strong>{{cekjasaperjalanan($data->jasa_perjalanan_id)->name}}:</strong><br>
                {{cekjasaperjalanan($data->jasa_perjalanan_id)->keterangan}}

          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total Pembiayaan</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td>Rp.{{rupiah($total)}}</td>
              </tr>
              <tr>
                <th>Jumlah Hari</th>
                <td>{{$data->selisih}} Hari</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp.{{rupiah($total*$data->selisih)}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-default " onclick="cetak_kwitansi({{$data->id}})"><i class="fa fa-print"></i> Cetak Kwitansi</button>
          <button type="button" class="btn btn-success " onclick="cetak_sppd({{$data->id}})"><i class="fa fa-print"></i> Cetak SPPD</button>
          <button type="button" class="btn btn-warning " onclick="cetak_spt({{$data->id}})"><i class="fa fa-print"></i> Cetak SPT</button>
          <button type="button" class="btn btn-success "><i class="fa fa-credit-card"></i> Nota Dinas</button>
          
        </div>
      </div>
    </section>
    <!-- /.content -->
@push('datatable')
<script>
    function cetak_kwitansi(a){
        window.location.assign("{{url('/surat_tugas/pdf/kwitansi/')}}/"+a);
    }

    function cetak_sppd(a){
        window.location.assign("{{url('/surat_tugas/pdf/sppd/')}}/"+a);
    }

    function cetak_spt(a){
        window.location.assign("{{url('/surat_tugas/pdf/spt/')}}/"+a);
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
@endpush
@endsection