<html>
    <head>
        <title>Daftar Golongan</title>
        <style>
            html{
                margin:50px 10px 10px 10px;
            }
            table{
                border-collapse:collapse;
            }
            th{
                border:solid 1px #000;
                padding:3px;
                font-size:10px;
                

            }
            .thtt{
               background:aqua;
               text-align:center;
            }
            .tdtt{
               background:aqua;
               text-align:center;
            }
            td{
                border:solid 1px #000;
                padding:3px;
                font-size:10px;
                vertical-align:top;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <thead>
                <tr>
                    <th class="tht" rowspan="2">No</th>
                    <th class="tht" rowspan="2">Program</th>
                    <th class="tht" rowspan="2">Kegiatan</th>
                    <th class="tht" rowspan="2">Tanggal Surat<br>Tugas</th>
                    <th class="tht" rowspan="2">Rincian Kegiatan di<br>Surat Tugas</th>
                    <th class="tht" rowspan="2">Nama (Sesuai<br>dengan tiket<b>pesawat)</th>
                    <th class="tht" rowspan="2">Golongan<br>Ruang</th>
                    <th class="tht" rowspan="2">Jabatan/<br>Eselon</th>
                    <th class="tht" rowspan="2">Tanggal<br>Pelaksanaan</th>
                    <th class="tht" rowspan="2">Tempat Pelaksanaan<br>Perjalanan Dinas</th>
                    <th class="tht" rowspan="2">Jumlah Hari<br>Pelaksanaan</th>
                    <th class="tht" rowspan="2">Biaya<br>Transport</th>
                    <th class="tht" rowspan="2">Uang Harian</th>
                    <th class="tht" rowspan="2">Biaya<br>Penginapan</th>
                    <th class="tht" rowspan="2">Biaya Lain-<br>lain</th>
                    <th class="tht" rowspan="2">Jumlah Biaya</th>
                    <th class="thtt" colspan="10">Rincian Tiket Pesawat</th>
                </tr>
                <tr>
                    <th class="thtt">ISSUED<br>BY/DITERBITKAN<br>OLEH</th>
                    <th class="thtt">JURUSAN</th>
                    <th class="thtt">NOMOR TIKET</th>
                    <th class="thtt">TANGGAl<br>BERANGKAT</th>
                    <th class="thtt">TANGGAL<br>KEMBALI</th>
                    <th class="thtt">MATA<br>UANG</th>
                    <th class="thtt">HARGA<br>AIRPORT<br>TAX</th>
                    <th class="thtt">HARGA<br>TIKET<br>BERANGKAT</th>
                    <th class="thtt">HARGA<br>TIKET<br>KEMBALI</th>
                    <th class="thtt">NAMA PESAWAT<br>UDARA</th>
                </tr>
                <tr>
                    <td class="tdtt">1</td>
                    <td class="tdtt">2</td>
                    <td class="tdtt">3</td>
                    <td class="tdtt">4</td>
                    <td class="tdtt">5</td>
                    <td class="tdtt">6</td>
                    <td class="tdtt">7</td>
                    <td class="tdtt">8</td>
                    <td class="tdtt">9</td>
                    <td class="tdtt">10</td>
                    <td class="tdtt">11</td>
                    <td class="tdtt">12</td>
                    <td class="tdtt">13</td>
                    <td class="tdtt">14</td>
                    <td class="tdtt">15</td>
                    <td class="tdtt">16</td>
                    <td class="tdtt">17</td>
                    <td class="tdtt">18</td>
                    <td class="tdtt">19</td>
                    <td class="tdtt">20</td>
                    <td class="tdtt">21</td>
                    <td class="tdtt">22</td>
                    <td class="tdtt">23</td>
                    <td class="tdtt">24</td>
                    <td class="tdtt">25</td>
                    <td class="tdtt">26</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no=>$data)
                    <tr>
                        <td class="tdt">{{$no+1}}</td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                        <td class="tdt"></td>
                    </tr>
                @endforeach
            </tbody>
    </body>
</html>