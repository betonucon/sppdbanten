<html>
    <head>
        <title>Kwitansi {{$data->nomor_surat}}</title>
        <style>

            @font-face {
                font-family: 'Textur';
                src: url({{url('/font/OstrichSansRounded-Medium.otf')}})  format('truetype');
            }
            body {
                font-family:'OstrichSansRounded',"sans-serif";
                color:#000;
            }
            html { 
                margin: 50px;
              
            }
            
            table{
                border-collapse:collapse;
                font-weight:bold;
            }
            th{
               
                padding:2px;
                font-size:15px;
            }
            td{
                /* border:solid 1px #000; */
                padding:0px;
                font-size:12px;
                vertical-align:top;
                font-weight:normal;
            }
            h2{
                padding:0px;
                margin:0px;
                font-size:17px;
                
            }
            h3{
                padding:0px;
                margin:0px;
                font-size:15px;
            }
            h4{
                padding:0px;
                margin:0px;
                font-size:14px;
            }
            .head-th{
                font-size:15px;
                
            }
            hr{
                padding:0px;
                margin:2px;
            }
            .tdr{
                padding:3px;
                font-weight:normal;
                border:solid 1px #fff;
                font-size:15px;
            }
            .tdrh{
                font-weight:normal;
                text-align:center;
                border:solid 1px #000;
                background:aqua;
            }
            .tdrs{
                padding:2px;
                font-weight:normal;
                border:solid 1px #000;
            }
            .tdrsss{
                padding:2px;
                font-weight:normal;
            }
        </style>
    </head>
    <body>
        
            <table width="100%">
                <thead>
                    <tr>
                        <th width="20%">
                            <img src="{{url('public/img/serang.png')}}" width="90px" height="100px">
                        </th>
                        <th width="55%" style="text-align:center">
                            <h2 style="margin:0px">{{kop_surat(Auth::user()->bidang_id)}}</h2>
                            <h1 style="margin:0px">{{kop_surat2(Auth::user()->bidang_id)}}</h1>
                            <h3 style="margin:0px">{{lokasi(Auth::user()->bidang_id)}}<h3>
                        
                        </th>
                        <th width="10%"></th>
                        
                    </tr>
                    <tr>
                        <th colspan="3">
                        <hr style="border:solid 2px #000">
                            <hr>
                    </tr>
                </thead>
            </table>  
            <table width="100%">
                <tr>
                    <td colspan="4" align="center">
                    <br><br><h3>RINCIAN BIAYA PERJALANAN DINAS DAN SPPD RAMPUNG</h3<br>
                    </td>
                </tr>
                
            </table>
            
                    
            <br><br><br>
            <table width="100%">
                <tr>
                    <td class="tdr" width="20%">Program</td>
                    <td class="tdr"  width="2%">:</td>
                    <td class="tdr">{{$data->maksud}}</td>
                </tr>
                <tr>
                    <td class="tdr">Kegiatan</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{cek_kegiatan($data->kegiatan_id)}}</td>
                </tr>
                <tr>
                    <td class="tdr">Nomor SPT</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{$data->nomor_surat}}</td>
                </tr>
                <tr>
                    <td class="tdr" style="vartical-align:top">Atas Nama</td>
                    <td class="tdr" style="vartical-align:top">:</td>
                    <td class="tdr">
                        @foreach($detail as $detail)
                            {{$detail->urut+1}}.{{cekpegawai($detail->pegawai_id)['nama']}}<br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="tdr">Tujuan</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{$data->tujuan}}</td>
                </tr>
                <tr>
                    <td class="tdr">Tanggal Berangkat</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{text_tanggal($data->date_mulai)}}</td>
                </tr>
                <tr>
                    <td class="tdr">Tanggal Pulang</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{text_tanggal($data->date_sampai)}}</td>
                </tr>
                <tr>
                    <td class="tdr">Keterangan</td>
                    <td class="tdr">:</td>
                    <td class="tdr">{{$data->dasar}}</td>
                </tr>
            </table><br>
            <table width="100%">
                <tr>
                    <td class="tdrh" rowspan="2" width="5%" align="center">No</td>
                    <td class="tdrh" colspan="3">PERINCIAN BIAYA</td>
                    <td class="tdrh" rowspan="2" width="13%">Pagu<br>Anggaran</td>
                    <td class="tdrh" rowspan="2" width="13%">UMK<br>(Di bayarkan)</td>
                    <td class="tdrh" rowspan="2" width="13%">Sisa Pagu</td>
                </tr>
                <tr>
                    <td class="tdrh">Rincian</td>
                    <td class="tdrh" width="8%">Volume</td>
                    <td class="tdrh" width="13%">Satuan Harga</td>
                </tr>
                <tr>
                    <td class="tdrs" align="center"><b>1.</b></td>
                    <td class="tdrs"><b>Uang Transport (Rill Cost)</b></td>
                    <td class="tdrs"><b></b></td>
                    <td class="tdrs"><b>Rp.</b></td>
                    <td class="tdrs"><b>Rp.</b></td>
                    <td class="tdrs">Rp.</td>
                    <td class="tdrs"><b>Rp.</b></td>
                </tr>
                <tr>
                    <td class="tdrs"><b></b></td>
                    <td class="tdrs"><i>a.Transport PP </i></td>
                    <td class="tdrs" align="center"><b>{{$data->selisih}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(transportasi($data->id),0)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(transportasi($data->id)*$data->selisih,0)}}.</b></td>
                    <td class="tdrs">Rp.{{number_format(transportasi($data->id)*$data->selisih,0)}}.</td>
                    <td class="tdrs"><b>Rp.</b></td>
                </tr>
                <tr>
                    <td class="tdrs"><b></b></td>
                    <td class="tdrs"><i>b.Ticketing PP </i></td>
                    <td class="tdrs" align="center"><b>0</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(harga_tiket($data->id),0)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(harga_tiket($data->id),0)}}.</b></td>
                    <td class="tdrs">Rp.{{number_format(harga_tiket($data->id),0)}}.</td>
                    <td class="tdrs"><b>Rp.</b></td>
                </tr>
                <tr>
                    <td class="tdrs" align="center"><b>2.</b></td>
                    <td class="tdrs"><b>Uang Harian</b></td>
                    <td class="tdrs" align="center"><b>{{$data->selisih}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_harian($data->id),0)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_harian($data->id)*$data->selisih,0)}}</b></td>
                    <td class="tdrs">Rp.{{number_format(uang_harian($data->id)*$data->selisih,0)}}</td>
                    <td class="tdrs"><b>Rp.-</b></td>
                </tr>
                <tr>
                    <td class="tdrs" align="center"><b>3.</b></td>
                    <td class="tdrs"><b>Uang Penginapan (Rill Cost)</b></td>
                    <td class="tdrs" align="center"><b>{{$data->selisih}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_penginapan($data->id),0)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_penginapan($data->id)*($data->selisih-1),0)}}</b></td>
                    <td class="tdrs">Rp.{{number_format(uang_penginapan($data->id)*($data->selisih-1),0)}}</td>
                    <td class="tdrs"><b>Rp.-</b></td>
                </tr>
                <tr>
                    <td class="tdrs" align="center"><b>4.</b></td>
                    <td class="tdrs" ><b>Uang Respresentasi </b></td>
                    <td class="tdrs" align="center"><b>{{($data->selisih-$data->selisih)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_representasi($data->id),0)}}</b></td>
                    <td class="tdrs"><b>Rp.{{number_format(uang_representasi($data->id)*$data->selisih,0)}}</b></td>
                    <td class="tdrs">Rp.{{number_format(uang_representasi($data->id)*$data->selisih,0)}}</td>
                    <td class="tdrs"><b>Rp.-</b></td>
                </tr>
                <tr>
                    <td class="tdrh" colspan="4"  align="center"><b>Jumlah</b></td>
                    <td class="tdrs" bgcolor="aqua"><b>Rp.{{number_format((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id),0)}}</b></td>
                    <td class="tdrs" bgcolor="aqua">Rp.{{number_format((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id),0)}}</td>
                    <td class="tdrs" bgcolor="aqua">Rp.</td>
                </tr>
               
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td class="tdrsss" align="center" colspan="3"><b>PERHITUNGAN SPPD RAMPUNG</b></td>
                </tr>
                <tr>
                    <td class="tdrsss"><b>Ditetapkan sejumlah (Pagu Anggaran)</b></td>
                    <td class="tdrsss" width="20%"></td>
                    <td class="tdrsss" width="20%"><b>Rp.{{number_format((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id),0)}}</b></td>
                </tr>
                <tr>
                    <td class="tdrsss"><b>Telah dibayar semula (UMK)</b></td>
                    <td class="tdrsss">Rp.{{number_format((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id),0)}}</td>
                    <td class="tdrsss"></td>
                </tr>
                <tr>
                    <td class="tdrsss" align="center"><br>Telah Dibayarkan sejumlah<br><b>Rp.{{number_format((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id),0)}}<br><br>{{terbilang((uang_harian($data->id)*$data->selisih)+(uang_penginapan($data->id)*($data->selisih-1))+(uang_representasi($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+harga_tiket($data->id))}}</b></td>
                    <td class="tdrsss"></td>
                    <td class="tdrsss"></td>
                </tr>
                    
            </table><br><br>
            <table width="100%">
                <tr align="center">
                    <td><br>Bendahara Pengeluaran,<br><br><br><br><u>{{bendahara()['name']}}</u><br>{{bendahara()['nip']}}</td>
                    <td>Serang, {{text_tanggal(date('Y-m-d'))}}<br>Yang Menerima<br><br><br><br><u>{{cekpegawai(detail_surat($data->id,0)['pegawai_id'])['nama']}}</u></td>
                </tr>
            </table>
    </body>
</html>