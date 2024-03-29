<html>
    <head>
        <title>Kwitansi {{$data->nomor_surat}}</title>
        <style>

            @font-face {
                font-family: 'Textur';
                src: url({{storage_path('fonts/textfont.ttf')}})  format('truetype');
            }
            body {
                font-family:'textfont',Arial, Helvetica, sans-serif;
                color:#000;
            }
            html { 
                margin: 30px;
              
            }
            
            table{
                border-collapse:collapse;
                font-weight:bold;
            }
            th{
               
                padding:2px;
                font-size:11px;
            }
            td{
                /* border:solid 1px #000; */
                padding:0px;
                font-size:11px;
                vertical-align:top;
                font-weight:normal;
            }
            h2{
                padding:0px;
                margin:0px;
                font-size:14px;
                
            }
            h3{
                padding:0px;
                margin:0px;
                font-size:13px;
            }
            h1{
                padding:0px;
                margin:0px;
            }
            h4{
                padding:0px;
                margin:0px;
                font-size:11px;
            }
            .head-th{
                font-size:12px;
                
            }
            hr{
                padding:0px;
                margin:2px;
            }
            .tdr{
                padding:5px;
                font-weight:bold;
                border:solid 1px #fff;
            }
            .tdrr{
                padding:10px;
                font-weight:bold;
                /* border:solid 1px #000; */
            }
            .tdrs{
                padding:2px;
                font-weight:bold;
                /* border:solid 1px #000; */
            }
        </style>
    </head>
    <body>
        @foreach($detail as $detail)
            <table width="100%">
                <thead>
                    <tr>
                        <th width="15%">
                            <img src="{{url('public/img/serang.png')}}" width="80px" height="90px">
                        </th>
                        <th width="55%" style="text-align:left">
                            <h2 style="margin:0px">{{kop_surat(Auth::user()->bidang_id)}}</h2>
                            <h1 style="margin:0px">{{kop_surat2(Auth::user()->bidang_id)}}</h1>
                            <h3 style="margin:0px">{{lokasi(Auth::user()->bidang_id)}}<h3>
                        
                        </th>
                        <th>
                            <table width="100%">
                                <tr>
                                    <td width="30%">Tanggal </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>Nomor </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>Koring </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>Program </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>Kegiatan </td>
                                    <td>:...............................</td>
                                </tr>
                                
                            </table>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"><hr></th>
                    </tr>
                </thead>
            </table>  
            <table width="100%">
                <tr>
                    <td colspan="4" align="center">
                    <br><br><h3>KWINTANSI (TANDA PEMBAYARAN)</h3><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="tdr" align="left">
                        SUDAH TERIMA DARI BENDAHARA PENGELUARAN SEKRETARIAT DAERAH KABUPATEN SERANG
                    </td>
                </tr>
                
            </table>
            <table width="100%" border="0">
                <tr>
                    <td class="tdr" >BANYAKNYA</td>
                    @if($data->angkutan_id==1)
                    <td class="tdr" colspan="3" bgcolor="#d1d1e1" style="font-weight:normal;text-align:left;font-style:italic;">
                    #{{(terbilang(($detail->transportasi*$data->selisih)+($detail->uang_harian*$data->selisih)+($detail->uang_representasi*$data->selisih)+($detail->uang_penginapan*$data->selisih)+($detail->harga_berangkat)+($detail->harga_kembali)))}} rupiah</td>
                    @else
                    <td class="tdr" colspan="3" bgcolor="#d1d1e1" style="font-weight:normal;text-align:left;font-style:italic;">
                    #{{(terbilang(($detail->transportasi*$data->selisih)+($detail->uang_harian*$data->selisih)+($detail->uang_representasi*$data->selisih)+($detail->uang_penginapan*$data->selisih)))}} rupiah</td>
                    @endif
                </tr>
                @if($data->angkutan_id==1)
                    <tr>
                        <td class="tdr" ></td>
                        <td class="tdr"colspan="3" bgcolor="#d1d1e1">Rp.{{number_format(($detail->transportasi*$data->selisih)+($detail->uang_harian*$data->selisih)+($detail->uang_representasi*$data->selisih)+($detail->uang_penginapan*$data->selisih)+($detail->harga_berangkat)+($detail->harga_kembali),0)}}</td>
                    </tr>
                @else
                    <tr>
                        <td class="tdr" ></td>
                        <td class="tdr"colspan="3" bgcolor="#d1d1e1">Rp.{{number_format(($detail->transportasi*$data->selisih)+($detail->uang_harian*$data->selisih)+($detail->uang_representasi*$data->selisih)+($detail->uang_penginapan*$data->selisih),0)}}</td>
                    </tr>
                @endif
                <tr>
                    <td class="tdr" >YAITU UNTUK</td>
                    @if($data->angkutan_id==1)
                        <td class="tdr" colspan="3" >
                            - Transportasi  Rp.{{uang($detail->transportasi*$data->selisih)}}, -Biaya Harian  Rp.{{uang($detail->uang_harian*$data->selisih)}}, -Biaya Representasi  Rp.{{uang($detail->uang_representasi*$data->selisih)}}, -Biaya Penginapan  Rp.{{uang($detail->uang_penginapan*$data->selisih)}},
                            -Biaya Keberangkatan  Rp.{{uang($detail->harga_berangkat)}}, -Biaya Kembali  Rp.{{uang($detail->harga_kembali)}}
                            <br>{{cek_kegiatan($data->kegiatan_id)}}
                        </td>

                    @else
                        <td class="tdr" colspan="3" >
                            - Transportasi  Rp.{{uang($detail->transportasi*$data->selisih)}}, -Biaya Harian  Rp.{{uang($detail->uang_harian*$data->selisih)}}, -Biaya Representasi  Rp.{{uang($detail->uang_representasi*$data->selisih)}}, -Biaya Penginapan  Rp.{{uang($detail->uang_penginapan*$data->selisih)}}
                            {{cek_kegiatan($data->kegiatan_id)}}
                        </td>

                    @endif
                   
                </tr>
                
            </table><br><br>
            <table width="100%" border="0">
                <tr>
                    <td class="tdrr" width="25%"  align="center">Mengetahui<br>Kuasa Pengguna Anggaran</td>
                    <td class="tdrr" width="18%" style="vertical-align:bottom" align="center">Bendaharawan</td>
                    <td class="tdrr" width="20%" style="vertical-align:bottom" align="center">PPTK</td>
                    <td class="tdrs" colspan="2" style="vertical-align:bottom;font-weight:bold">Serang, {{text_tanggal($data->date_kwitansi)}} <br>Yang Menerima</td>
                </tr>
                <tr>
                    <td class="tdrs" rowspan="6"></td>
                    <td class="tdrs" rowspan="6"></td>
                    <td class="tdrs" rowspan="6"></td>
                    <td class="tdrs" width="10%">Nama</td>
                    <td class="tdrs">: {{cekpegawai($detail->pegawai_id)->nama}}</td>
                </tr>
                
                <tr>
                    <td class="tdrs">Pangkat/Jabatan</td>
                    <td class="tdrs">:{{cekpegawai($detail->pegawai_id)->golongan}}</td>
                </tr>
                <tr>
                    <td class="tdrs">Satuan Kerja</td>
                    <td class="tdrs">:{{cekpegawai($detail->pegawai_id)->jabatan}} </td>
                </tr>
                <tr>
                    <td class="tdrs">TANDA TANGAN</td>
                    <td class="tdrs"></td>
                </tr>
                
                <tr>
                    <td class="tdrs" rowspan="2"></td>
                    <td class="tdrs" align="center">&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td class="tdrs" rowspan="2" align="center">&nbsp;<br></td>
                </tr>
                <tr>
                    <td class="tdrs" align="center"><h4><u>...................................</u></h4><h4>NIP. ...........................</h4></td>
                    <td class="tdrs" align="left"><h4><u>{{bendahara()->name}}</u></h4><h4>NIP.{{bendahara()->nip}}</h4></td>
                    <td class="tdrs" align="center"><h4><u>...................................</u></h4><h4>NIP. ...........................</h4></td>
                    <td class="tdrs"></td>
                </tr>
            </table>
            <div style="height:450px;width:100%"></div>
        @endforeach
    </body>
</html>