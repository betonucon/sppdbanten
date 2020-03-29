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
                margin: 35px;
              
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
                font-size:13px;
                vertical-align:top;
                font-weight:normal;
            }
            h1{
                padding:0px;
                margin:0px;
                font-size:26px;
                
            }
            h2{
                padding:0px;
                margin:0px;
                font-size:18px;
                
            }
            h3{
                padding:0px;
                margin:0px;
                font-size:13px;
            }
            h4{
                padding:0px;
                margin:0px;
                font-weight:normal;
                font-size:15px;
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
            .colm{
                padding:5px;
                font-weight:normal;
                border:solid 1px #fff;
            }
            .cols{
                padding:8px;
                font-weight:normal;
            }
        </style>
    </head>
    <body>
        
            <table width="100%" >
                <thead>
                    <tr>
                        <th width="25%" style="text-align:left">
                            <img src="{{url('/img/serang.png')}}" width="80px" height="90px">
                        </th>
                        <th  style="text-align:center">
                            <h2>PEMERINTAH KABUPATEN SERANG</h2>
                            <h1>SEKRETARIAT DAERAH</h1>
                            <h3>Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737 Fax. (0254) 201952 Serang - Banten<h3>
                        
                        </th>
                        <th width="10%">

                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <hr style="border:solid 2px #000">
                            <hr>
                        </th>
                    </tr>
                </thead>
            </table>  
            <table width="100%">
                <tr>
                    <td colspan="4" align="center">
                    <br><br>
                        <h1><u>SURAT PERINTAH TUGAS</u></h1><h4>NOMOR : {{$data->nomor_surat}}</h4>
                    </td>
                </tr>
                
            </table><br><br>
            <table width="100%">
                <tr>
                    <td class="colm" width="15%">Dasar</td>
                    <td class="colm" width="5%">:</td>
                    <td class="colm" colspan="2">{{$data->dasar}}</td>
                </tr>
                <tr>
                    <td class="colm" ></td>
                    <td class="colm" ></td>
                    <td class="colm" colspan="2" align="left"><h2>MEMERINTAHKAN / MENUGASKAN</h2></td>
                </tr>
                @foreach($detailspt as $detail)
                    <tr>
                        <td class="colm" >@if($detail->urut==0) Kepada @endif</td>
                        <td class="colm" align="center">{{$detail->urut+1}}.</td>
                        <td class="colm" width="20%" >Nama</td>
                        <td class="colm" >: {{cekpegawai($detail->pegawai_id)->nama}}</td>
                    </tr>
                    <tr>
                        <td class="colm" ></td>
                        <td class="colm" ></td>
                        <td class="colm"  >NIP</td>
                        <td class="colm" >: {{cekpegawai($detail->pegawai_id)->nip}}</td>
                    </tr>
                    <tr>
                        <td class="colm" ></td>
                        <td class="colm" ></td>
                        <td class="colm"  >Pangkat/Gol</td>
                        <td class="colm" >: {{cekpegawai($detail->pegawai_id)->golongan}}</td>
                    </tr>
                    <tr>
                        <td class="colm" ></td>
                        <td class="colm" ></td>
                        <td class="colm"  >Jabatan</td>
                        <td class="colm" >: {{cekpegawai($detail->pegawai_id)->jabatan}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td class="colm" >Untuk</td>
                        <td class="colm" >:</td>
                        <td class="colm" colspan="2">
                            {{$data->maksud}}
                        </td>
                    </tr>
                    <tr>
                        <td class="colm" ></td>
                        <td class="colm" ></td>
                        <td class="colm" colspan="2">
                        Demikian surat perintah ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.
                        </td>
                    </tr>
            </table>
            
            <br><br>
            <table width="100%">
                <tr>
                    <td class="colm" width="60%"></td>
                    <td class="colm">Ditetapkan di Serang 
                    <br>Pada Tanggal {{text_tanggal($data->date_surat)}}<br><br>
                    <h3>A.N PEMERINTAH KABUPATEN SERANG</h3></td>
                </tr>
                <tr>
                    <td class="colm"></td>
                    <td class="colm" align="center"><br><br><br><br><h3>NIP</h3></td>
                </tr>
            </table>
            
            <div style="height:430px;width:100%"></div>
      
    </body>
</html>