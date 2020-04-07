<html>
    <head>
        <title>Laporan Data Kwitansi</title>
        <style>
            html{
                margin:50px 10px 10px 10px;
            }
            table{
                border-collapse:collapse;
            }
            .tht{
                border:solid 1px #000;
                padding:5px;
                font-size:14px;
                text-transform:uppercase;
                background:aqua;
                

            }
            .tdt{
                border:solid 1px #000;
                padding:5px;
                font-size:14px;
                text-align:left;
                

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
                font-size:14px;
                vertical-align:top;
            }
        </style>
    </head>
    <body>
        <center><h2>LAPORAN DETAIL KWITANSI</h2></center>
        <table width="100%">
            <thead>
                <tr>
                    <th class="tht" width="5%">No</th>
                    <th class="tht">Nama</th>
                    <th class="tht">Jabatan</th>
                    <th class="tht">Golongan</th>
                    <th class="tht">Tujuan</th>
                    <th class="tht">TANGGAL<br>KEBERANGKATAN / KEPULANGAN</th>
                    <th class="tht">Lama<br>Perjalanan</th>
                    <th class="tht">Uang<br>Harian</th>
                    <th class="tht">Uang<br>Refre</th>
                    <th class="tht">tiket<br>pp</th>
                    <th class="tht">Transportasi</th>
                    <th class="tht">Penginapan</th>
                    <th class="tht"></th>
                </tr>
                @foreach($data as $no=>$data)
                    <?php $subtotal=0;?>
                    @foreach(detailsurat($data->id) as $detailnya)
                    <tr>
                        <th class="tdt">{{$no+1}}.{{$detailnya['urut']}}</th>
                        <th class="tdt">{{cekpegawai($detailnya['pegawai_id'])['nama']}}</th>
                        <th class="tdt">{{cekpegawai($detailnya['pegawai_id'])['jabatan']}}<</th>
                        <th class="tdt">{{tujuan_sppd($detailnya['pegawai_id'])['golongan']}}<</th>
                        <th class="tdt">{{tujuan_sppd($data['tujuan_sppd_id'])}}<</th>
                        <th class="tdt">{{text_tanggal($data['date_mulai'])}} s/d<br> {{text_tanggal($data['date_sampai'])}}</th>
                        <th class="tdt">{{$data['selisih']}} Hari</th>
                        <th class="tdt">Rp.{{uang($detailnya['uang_harian'])}}</th>
                        <th class="tdt">Rp.{{uang($detailnya['uang_representasi'])}}</th>
                        <th class="tdt">Rp.{{uang($detailnya['harga_berangkat']+$detailnya['harga_kembali'])}}</th>
                        <th class="tdt">Rp.{{uang($detailnya['transportasi'])}}</th>
                        <th class="tdt">Rp.{{uang($detailnya['uang_penginapan'])}}</th>
                        <th class="tdt">Rp.{{uang(total_kwitansi($detailnya['id'],$data['selisih']))}}</th>
                        <?php $subtotal+=total_kwitansi($detailnya['id'],$data['selisih']);?>
                   </tr>
                    @endforeach
                    <tr>
                        <th class="tdt" colspan="12">Total</th>
                        <th class="tdt">Rp.{{uang($subtotal)}}</th>
                    </th>
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