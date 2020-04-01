<html>
    <head>
        <title>Daftar Bidang</title>
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
                    <th>Nama Bidang</th>
                    <th>Kopsurat</th>
                    <th>Kopsurat2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no=>$data)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->kopsurat}}</td>
                        <td>{{$data->kopsurat2}}</td>
                        </tr>
                @endforeach
            </tbody>
    </body>
</html>