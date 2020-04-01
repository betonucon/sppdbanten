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
                font-size:14px;
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
                padding:2px;
                font-weight:bold;
                text-align:center;
                border:solid 1px #000;
            }
            .tdrs{
                padding:2px;
                font-weight:normal;
                border:solid 1px #000;
            }
        </style>
    </head>
    <body>
        
            <table width="100%">
                <thead>
                    <tr>
                        <th width="20%">
                            <img src="{{url('/img/serang.png')}}" width="90px" height="100px">
                        </th>
                        <th width="55%" style="text-align:center">
                            <h2>PEMERINTAH KABUPATEN SERANG</h2>
                            <h2>SEKRETARIAT DAERAH</h2>
                            <h3>Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737<br>Fax. (0254) 201952 Serang - Banten<h3>
                        
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
                    <br><br><h3>PEMBAYARAN TRANSPORT DAN AKOMODASI / PENGINAPAN</h3><h3>(  RILL COST )</h3<br>
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
            </table><br>
            <table width="100%">
                <tr>
                    <td class="tdrh">No</td>
                    <td class="tdrh">Perincian Biaya</td>
                    <td class="tdrh">Rill Cost</td>
                    <td class="tdrh">Keterangan</td>
                </tr>
                <tr>
                    <td class="tdrs">1.</td>
                    <td class="tdrs"><b>Transport</b><br>1.Transport PP<br>2.Tiketing PP</td>
                    <td class="tdrs"><br>Rp.{{transportasi($data->id)*$data->selisih}}<br>Rp.{{harga_tiket($data->id)}}</td>
                    <td class="tdrs"></td>
                </tr>
                <tr>
                    <td class="tdrs">2.</td>
                    <td class="tdrs"><b>Uang Penginapan</b><br>{{$data->selisih}} X {{uang_penginapan($data->id)}}</td>
                    <td class="tdrs">Rp.{{uang_penginapan($data->id)}}<br>Rp.{{(uang_penginapan($data->id)*$data->selisih)}}</td>
                    <td class="tdrs"></td>
                </tr>
                <tr>
                    <td class="tdrs" colspan="2" align="center"><b>Jumlah</b></td>
                    <td class="tdrs">Rp.{{(uang_penginapan($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+(harga_tiket($data->id))}}</td>
                    <td class="tdrs"></td>
                </tr>
                <tr>
                    <td class="tdrs" Colspan="4" style="text-transform:capitalize;font-style:italic"><b>Terbilang :</b>   # {{terbilang((uang_penginapan($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+(harga_tiket($data->id)))}}</td>
                </tr>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td class="tdr" align="justify" colspan="2">&nbsp;&nbsp;&nbsp;Jumlah uang tersebut diatas benar - benar dikeluarkan untuk pelaksanaan Perjalanan Dinas
                    dimaksud dan apabila dikemudian hari dapat kelebihan atas pembayaran, kami bersedia untuk
                    menyetorkan kelebihan tersebut ke Kas Daerah.<br></td>
                    
                </tr>
                <tr>
                    <td width="50%" class="tdr" align="center">Telah Dibayarkan Sejumlah<br><b>Rp.{{(uang_penginapan($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+(harga_tiket($data->id))}}</b></td>
                    <td class="tdr" align="center">Telah Menerima Jumlah Uang Sebesar<br><b>Rp.{{(uang_penginapan($data->id)*$data->selisih)+(transportasi($data->id)*$data->selisih)+(harga_tiket($data->id))}}</b></td>
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