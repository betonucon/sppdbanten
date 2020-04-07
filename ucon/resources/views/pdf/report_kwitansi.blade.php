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
        <center><h2>LAPORAN DATA KWITANSI</h2></center>
        <table width="100%">
            <thead>
                <tr>
                    <th class="tht" width="5%">No</th>
                    <th class="tht">Tanggal</th>
                    <th class="tht">Nomor Rekening</th>
                    <th class="tht">Nama Bendahara</th>
                    <th class="tht">Kegiatan</th>
                    <th class="tht">Nominal (Rp.)</th>
                </tr>
                @foreach($data as $no=>$data)
                    <tr>
                        <th class="tdt">{{$no+1}}</th>
                        <th class="tdt">{{tanggal_surat($data['date_surat'])}}</th>
                        <th class="tdt">{{$data['nomor_rekening']}}</th>
                        <th class="tdt">{{bendahara()['name']}}</th>
                        <th class="tdt">{{cek_kegiatan($data['kegiatan_id'])}}</th>
                        <th class="tdt">Rp.{{uang((transportasi($data['id'])*$data['selisih'])+(uang_harian($data['id'])*$data['selisih'])+(uang_penginapan($data['id'])*$data['selisih'])+(uang_representasi($data['id'])*$data['selisih'])+harga_tiket($data['id']))}}</th>
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