<html>
    <head>
        <title>Daftar Kegiatan</title>
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
                    <th>Nama Kegiatan</th>
                    <th>Jumlah</th>
                    <th>Kode Rekening</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no=>$data)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->jumlah}}</td>
                        <td>{{$data->kode_rekening}}</td>
                        <td>{{author($data->users_id)}}</td>
                        </tr>
                @endforeach
            </tbody>
    </body>
</html>