<html>
    <head>
        <title>Surat SPPD</title>
        <style>
            html { margin: 20px}
            table{
                border-collapse:collapse;
            }
            th{
                
                padding:5px;
                font-size:11px;
                
                

            }
            td{
                border:solid 1px #000;
                padding:5px;
                font-size:12px;
                vertical-align:top;
            }
            h2{
                padding:0px;
                margin:2px;
            }
            h3{
                padding:0px;
                margin:2px;
            }
            hr{
                padding:0px;
                margin:2px;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <thead>
                <tr>
                    <th width="10%">
                        <img src="{{url('/img/serang.png')}}" width="70px" height="80px">
                    </th>
                    <th>
                        <h2>PEMERINTAH KABUPATEN SERANG</h2>
                        <h2 style="text-transform:uppercase">Dinas Pendidikan Dan Kebudayaan Provinsi Banten</h2>
                        <h3>Kawasan Pusat Pemerintahan Provinsi Banten JL. Syech Nawawi Al-Bantani - Curug - Palima <br>Kota Serang - Provinsi Banten</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"><hr></th>
                </tr>
            </thead>
          </table>  
          <table width="100%">
            <tr>
                <td colspan="4" align="center">
                    <h3><u>SURAT PERINTAH PERJALANAN DINAS</u></h3>
                    <h3>Nomor : {{$data->nomor_surat}}</h3><br>
                </td>
            </tr>
            <tr>
                <td width="28%">Pejabat berwenang memberi perintah</td>
                <td>: </td>
                <td></td>
                <td></td>
            </tr>
          </table>
    </body>
</html>