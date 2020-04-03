<html>
    <head>
        <title>Daftar Pegawai</title>
        <style>
            table{
                border-collapse:collapse;
            }
            th{
                border:solid 1px #000;
                padding:5px;
                font-size:11px;
                

            }
            td{
                border:solid 1px #000;
                padding:5px;
                font-size:10px;
                vertical-align:top;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Pangkat</th>
                    <th width="10%">Golongan</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $no=>$pegawai)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$pegawai->nama}}</td>
                        <td>{{$pegawai->nip}}</td>
                        <td>{{$pegawai->pangkat}}</td>
                        <td>{{$pegawai->golongan}}</td>
                        <td>{{$pegawai->jabatan}}</td>
                       
                    </tr>
                @endforeach
            </tbody>
    </body>
</html>