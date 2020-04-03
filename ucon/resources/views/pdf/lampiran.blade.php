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
                margin: 40px;
              
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
                border:solid 1px #000;
            }
            .colm{
                padding:5px;
                font-weight:normal;
                border:solid 1px #000;
            }
            .colms{
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
                <tr>
                    <td class="colm" width="5%">I.</td>
                    <td class="colm" width="43%">
                        
                    </td>
                    <td class="colm">
                        <table width="100%">    
                            <tr>
                                <td width="35%">Berangkat dari (Tempat Kedudukan)</td>
                                <td width="3%">:</td>
                                <td>Serang</td>
                            </tr>
                            <tr>
                                <td>Ke</td>
                                <td>:</td>
                                <td>{{$data->tujuan}}</td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_sampai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><br><b>a/n SEKRETARIAT DAERAH<br>KABUPATEN SERANG</b><br><br><br><br>
                                <h3 style="margin:0px;border-bottom:solid 1px #000;min-width:10px;display:inline">{{sekretaris_daerah()['name']}}</h3>
                                <h3>NIP: {{sekretaris_daerah()['nip']}}</h3>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="colm">II.</td>
                    <td class="colm" >
                        <table width="100%">    
                            <tr>
                                <td width="35%">Tiba di </td>
                                <td width="3%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_mulai)}}</td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="colm">
                        <table width="100%">    
                            <tr>
                                <td width="35%">Berangkat dari</td>
                                <td width="3%">:</td>
                                <td>Serang</td>
                            </tr>
                            <tr>
                                <td>Ke</td>
                                <td>:</td>
                                <td>{{$data->tujuan}}</td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_mulai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="colm">III.</td>
                    <td class="colm" >
                        <table width="100%">    
                            <tr>
                                <td width="35%">Tiba di </td>
                                <td width="3%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_sampai)}}</td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="colm">
                        <table width="100%">    
                            <tr>
                                <td width="35%">Berangkat dari</td>
                                <td width="3%">:</td>
                                <td>Serang</td>
                            </tr>
                            <tr>
                                <td>Ke</td>
                                <td>:</td>
                                <td>{{$data->tujuan}}</td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_mulai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="colm">IV.</td>
                    <td class="colm" >
                        <table width="100%">    
                            <tr>
                                <td width="35%">Tiba di </td>
                                <td width="3%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_sampai)}}</td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="colm">
                        <table width="100%">    
                            <tr>
                                <td width="35%">Berangkat dari</td>
                                <td width="3%">:</td>
                                <td>Serang</td>
                            </tr>
                            <tr>
                                <td>Ke</td>
                                <td>:</td>
                                <td>{{$data->tujuan}}</td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_mulai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><br><b></b><br><br><br><br>
                                <u><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></u>
                                <br><b>NIP..........................................</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="colm">VI.</td>
                    <td class="colm" >
                        <table width="100%">    
                            <tr>
                                <td width="35%">Tiba di </td>
                                <td width="3%">:</td>
                                <td>Serang</td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td>:</td>
                                <td>{{text_tanggal($data->date_sampai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><br><b>a/n SEKRETARIAT DAERAH<br>KABUPATEN SERANG</b><br><br><br><br><br>
                                <h3 style="margin:0px;border-bottom:solid 1px #000;min-width:10px;display:inline">{{sekretaris_daerah()['name']}}</h3>
                                <h3>NIP: {{sekretaris_daerah()['nip']}}</h3>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="colm"  align="justify">
                            Telah diperiksa dengan keterangan bahwa perjalanan tersebut
                            atas perintahnya dan semata - mata untuk kepentingan jabatan
                            dalam waktu yang sesingkat – singkatnya.<hr>

                    </td>
                </tr>
                <tr>
                    <td class="colm">VII.</td>
                    <td class="colm" > VII. Catatan Lain - Lain</td>
                    <td class="colm"> </td>
                </tr>
                <tr>
                    <td class="colms" colspan="3">
                        VIII. Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan
                        tanggal berangkat / tiba serta bendaharawan bertanggaung jawab berdasarkan peraturan – peraturan Keuangan Negara
                        apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaan.
                    </td>
                </tr>
            </table>  
            
    </body>
</html>