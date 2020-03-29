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
                padding:8px;
                font-weight:normal;
                border:solid 1px #000;
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
                        <th width="20%">
                            <img src="{{url('/img/serang.png')}}" width="80px" height="90px">
                        </th>
                        <th  style="text-align:center">
                            <h2>PEMERINTAH KABUPATEN SERANG</h2>
                            <h1>SEKRETARIAT DAERAH</h1>
                            <h3>Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737 Fax. (0254) 201952 Serang - Banten<h3>
                        
                        </th>
                        
                    </tr>
                    <tr>
                        <th colspan="2">
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
                        <h2><u>SURAT PERINTAH PERJALANAN DINAS</u></h2><h4>NOMOR : {{$data->nomor_sppd}}</h4>
                    </td>
                </tr>
                
            </table><br><br>
            <table width="100%">
                <tr>
                    <td class="colm" width="7%" align="center">1.</td>
                    <td class="colm">Pejabat berwenang yang memiliki perintah</td>
                    <td class="colm" width="38%">{{pejabat($data->pejabat_id)->name}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">2.</td>
                    <td class="colm">Nama / Pegawai yang diperintah</td>
                    <td class="colm">{{cekpegawai($diperintah->pegawai_id)->nama}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">3.</td>
                    <td class="colm">NIP</td>
                    <td class="colm">{{cekpegawai($diperintah->pegawai_id)->nip}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">4.</td>
                    <td class="colm">
                        a. Pangkat dan Golongan menurut PP No. 11 Tahun 2011<br>
                        b. Jabatan / Instansi<br>
                        c. Tingkat Biaya Perjalanan Dinas
                    </td>
                    <td class="colm">
                        {{cekpegawai($diperintah->pegawai_id)->golongan}}
                    </td>
                </tr>
                <tr>
                    <td class="colm" align="center">5.</td>
                    <td class="colm">Maksud Perjalanan Dinas</td>
                    <td class="colm">{{$data->maksud}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">6.</td>
                    <td class="colm">Alat angkutan yang dipergunakan</td>
                    <td class="colm">{{angkutan($data->angkutan_id)}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">7.</td>
                    <td class="colm">a. Tempat berangkat<br>b. Tempat Tujuan</td>
                    <td class="colm">{{tujuan_sppd($data->tujuan_sppd_id)}}<br>{{$data->tujuan}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">8.</td>
                    <td class="colm">
                        a. Lamanya Perjalanan dinas<br>
                        b. Tanggal Berangkat<br>
                        c. Tanggal harus kembali/tiba ditempat baru *)</td>
                    <td class="colm">{{$data->selisih}} ({{terbilang($data->selisih)}}) Hari<br>{{text_tanggal($data->date_mulai)}}<br>{{text_tanggal($data->date_sampai)}}</td>
                </tr>
                <tr>
                    <td class="colm" align="center">9.</td>
                    <td class="colm">Pengikut : Nama</td>
                    <td class="colm">Pangkat/Golongan</td>
                </tr>
                <tr>
                    <td class="colm" align="center"></td>
                    <td class="colm">
                        @foreach($detail as $detail)
                            {{$detail->urut}}.{{cekpegawai($detail->pegawai_id)->nama}}<br>
                        @endforeach
                    </td>
                    <td class="colm">
                        @foreach($nipdetail as $nipdetail)
                            {{$nipdetail->urut}}.{{cekpegawai($nipdetail->pegawai_id)->golongan}}<br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="colm" align="center">10.</td>
                    <td class="colm">
                        Pembebanan anggaran<br>
                        a. Instansi<br>
                        b. Mata anggaran
                    </td>
                    <td class="colm">
                        Sekretariat Daerah Kota Serang<br>
                        5.2.2.15.02. 01
                    </td>
                </tr>
                <tr>
                    <td class="colm" align="center">11.</td>
                    <td class="colm">Keterangan Lain-lain</td>
                    <td class="colm">{{$data->maksud}}</td>
                </tr>
            </table><br><br>
            <table width="100%">
                <tr>
                    <td class="cls">*) Coret yang tidak perlu</td>
                    <td class="cls">Dikeluarkan di</td>
                    <td class="cls">: Serang</td>
                    <td class="cls">.</td>
                </tr>
                <tr>
                    <td class="cls"></td>
                    <td class="cls" width="15%">Tanggal</td>
                    <td class="cls" width="25%">:</td>
                    <td class="cls" width="10%">2020</td>
                </tr>
                <tr>
                    <td class="cls"></td>
                    <td class="cls" colspan="3" align="center"><br><b>A.N PEMERINTAH KABUPATEN SERANG</b><br><br><br><br><br><br>NIP.</td>
                </tr>
            </table>
            
            <div style="height:430px;width:100%"></div>
      
    </body>
</html>