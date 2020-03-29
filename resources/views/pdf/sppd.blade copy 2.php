<html>
    <head>
        <title>Surat SPPD</title>
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
        </style>
    </head>
    <body>
            <table width="100%">
                <thead>
                    <tr>
                        <th width="15%">
                            <img src="{{url('/img/serang.png')}}" width="80px" height="90px">
                        </th>
                        <th width="55%">
                            <h2>PEMERINTAH KABUPATEN SERANG</h2>
                            <h2>SEKRETARIAT DAERAH</h2>
                            <h3>Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737<br>Fax. (0254) 201952 Serang - Banten<h3>
                        
                        </th>
                        <th>
                            <table width="100%">
                                <tr>
                                    <td colspan="2" class="head-th">Kesatu/Kedua/Ketiga/Keempat/Kelima</td>
                                </tr>
                                <tr>
                                    <td width="30%">(Tanggal </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>Kas Pos (Nomor </td>
                                    <td>:...............................</td>
                                </tr>
                                <tr>
                                    <td>(Rekening </td>
                                    <td>: 123</td>
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
                    <td colspan="4" align="center">
                        SUDAH TERIMA DARI BENDAHARA PENGELUARAN SEKRETARIAT DAERAH KABUPATEN SERANG
                    </td>
                </tr>
                
            </table>
            <br><br>
            <table width="100%" border="0">
                <tr>
                    <td class="tdr" >BANYAKNYA</td>
                    <td class="tdr" colspan="3" bgcolor="#d1d1e1" style="font-weight:normal;text-align:center;font-style:italic;">#{{terbilang($total)}} rupiah</td>
                </tr>
                <tr>
                    <td class="tdr" ></td>
                    <td class="tdr" width="25%" bgcolor="#d1d1e1">Rp.</td>
                    <td class="tdr" width="25%" bgcolor="#d1d1e1">{{number_format($total,0)}}</td>
                    <td class="tdr" width="35%"></td>
                </tr>
                <tr>
                    <td class="tdr" >RINCIAN BIAYA</td>
                    <td class="tdr" colspan="3" >- Transportasi  Rp.{{$transportasi}}, -Biaya Harian  Rp.{{$harian}}, -Biaya Representasi  Rp.{{$representasi}}, -Biaya Penginapan  Rp.{{$penginapan}}</td>
                </tr>
                <tr>
                    <td class="tdr" >YAITU UNTUK</td>
                    <td class="tdr" colspan="3" >{{cek_kegiatan($data->kegiatan_id)}}</td>
                </tr>
            </table>
    </body>
</html>