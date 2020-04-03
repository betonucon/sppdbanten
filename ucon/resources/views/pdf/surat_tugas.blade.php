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
            .ttd{
               text-align:center;
               border:solid 1px #fff;
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
                <tr align="center">
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
                    <td class="thtt">17</td>
                    <td class="thtt">18</td>
                    <td class="thtt">19</td>
                    <td class="thtt">20</td>
                    <td class="thtt">21</td>
                    <td class="thtt">22</td>
                    <td class="thtt">23</td>
                    <td class="thtt">24</td>
                    <td class="thtt">25</td>
                    <td class="thtt">26</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no=>$data)
                    <?php $nilai=0;?>
                    @foreach(detail_utama($data->id,0) as $detail)
                        <?php $nilai+=(($detail->transportasi+$detail->uang_harian+$detail->uang_penginapan+$detail->uang_representasi)*$data->selisih);?>
                        <tr>
                            <td class="tdt" rowspan="{{jumlah_pegawai($data->id)}}">{{$no+1}}</td>
                            <td class="tdt" rowspan="{{jumlah_pegawai($data->id)}}"></td>
                            <td class="tdt" rowspan="{{jumlah_pegawai($data->id)}}">{{cek_kegiatan($data->kegiatan_id)}}</td>
                            <td class="tdt" rowspan="{{jumlah_pegawai($data->id)}}">{{tanggal($data->date_surat)}}</td>
                            <td class="tdt" rowspan="{{jumlah_pegawai($data->id)}}">{{$data->kunjungan}}</td>
                            <td class="tdt">{{cekpegawai($detail->pegawai_id)['nama']}}</td>
                            <td class="tdt">{{cekpegawai($detail->pegawai_id)['golongan']}}</td>
                            <td class="tdt">{{cekpegawai($detail->pegawai_id)['jabatan']}}</td>
                            <td class="tdt" align="center">{{tgl($data->date_mulai)}} s/d {{tgl($data->date_sampai)}} {{bln($data->date_sampai)}}<br>{{thn($data->date_sampai)}}</td>
                            <td class="tdt">{{$data->tujuan}},{{tujuan_sppd($data->tujuan_sppd_id)}}</td>
                            <td class="tdt" align="center">{{$data->selisih}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detail->transportasi)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detail->uang_harian)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detail->uang_penginapan)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detail->uang_representasi)}}</td>
                            <td class="tdt" align="center">Rp.{{uang(($detail->transportasi+$detail->uang_harian+$detail->uang_penginapan+$detail->uang_representasi)*$data->selisih)}}</td>
                            <td class="tdt" align="center">{{cekjasaperjalanan($data->jasa_perjalanan_id)['name']}}</td>
                            <td class="tdt" align="center">{{$data->jurusan}}</td>
                            <td class="tdt" align="center">{{$detail->nomor_tiket}}</td>
                            <td class="tdt" align="center">{{tanggal($data->date_berangkat)}}</td>
                            <td class="tdt" align="center">{{tanggal($data->date_kembali)}}</td>
                            <td class="tdt" align="center">Rupiah</td>
                            <td class="tdt"></td>
                            <td class="tdt">Rp.{{uang($detail->harga_berangkat)}}</td>
                            <td class="tdt">Rp.{{uang($detail->harga_kembali)}}</td>
                            <td class="tdt">{{$data->pesawat}}</td>
                        </tr>
                    @endforeach
                    <?php $nilainya=0;?>
                    @foreach(detailsurat($data->id) as $detailnya)
                        <?php $nilainya+=(($detailnya->transportasi+$detailnya->uang_harian+$detailnya->uang_penginapan+$detailnya->uang_representasi)*$data->selisih); ?>
                        <tr>
                            <td class="tdt">{{cekpegawai($detailnya->pegawai_id)['nama']}}</td>
                            <td class="tdt">{{cekpegawai($detailnya->pegawai_id)['golongan']}}</td>
                            <td class="tdt">{{cekpegawai($detailnya->pegawai_id)['jabatan']}}</td>
                            <td class="tdt" align="center">{{tgl($data->date_mulai)}} s/d {{tgl($data->date_sampai)}} {{bln($data->date_sampai)}}<br>{{thn($data->date_sampai)}}</td>
                            <td class="tdt">{{$data->tujuan}},{{tujuan_sppd($data->tujuan_sppd_id)}}</td>
                            <td class="tdt" align="center">{{$data->selisih}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detailnya->transportasi)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detailnya->uang_harian)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detailnya->uang_penginapan)}}</td>
                            <td class="tdt" align="center">Rp.{{uang($detailnya->uang_representasi)}}</td>
                            <td class="tdt" align="center">Rp.{{uang(($detailnya->transportasi+$detailnya->uang_harian+$detailnya->uang_penginapan+$detailnya->uang_representasi)*$data->selisih)}}</td>
                            <td class="tdt" align="center">{{cekjasaperjalanan($data->jasa_perjalanan_id)['name']}}</td>
                            <td class="tdt" align="center">{{$data->jurusan}}</td>
                            <td class="tdt" align="center">{{$detailnya->nomor_tiket}}</td>
                            <td class="tdt" align="center">{{tanggal($data->date_berangkat)}}</td>
                            <td class="tdt" align="center">{{tanggal($data->date_kembali)}}</td>
                            <td class="tdt" align="center">Rupiah</td>
                            <td class="tdt"></td>
                            <td class="tdt">Rp.{{uang($detailnya->harga_berangkat)}}</td>
                            <td class="tdt">Rp.{{uang($detailnya->harga_kembali)}}</td>
                            <td class="tdt">{{$data->pesawat}}</td>
                        </tr>
                    @endforeach
                    <tr>
                            <td class="tdt" colspan="15"></td>
                            <td class="tdt" >Rp.{{uang($nilainya+$nilai)}}</td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            <td class="tdt" ></td>
                            
                        </tr>
                @endforeach
            </table><br><br>
            <table width="100%">
                <tr>
                    <td class="ttd"></td>
                    <td class="ttd" width="30%" align="center">
                        <b>Kepala Bagian Bina Program<br>Sekretariat Daerah Kab. Serang<br><br><br>
                          {{sekretaris_daerah()['name']}}<br><h3 style="border-top:solid 1px #000;min-width:10px;display:inline">{{sekretaris_daerah()['nip']}}</h3></b>
                    </td>
                    <td class="ttd" width="10%">
                    </td>
                </tr>
            </table>
    </body>
</html>