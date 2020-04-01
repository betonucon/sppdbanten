<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Role;
use App\Route;
use App\Hasrole;
use PDF;

class UsersController extends Controller
{
    public function index($notif=null){
        $page="Daftar Role";
        $ketpage="Daftar Role App";
        $url='user/';
        $user=Role::all();
        $modaluser=Role::all();
        $rout=Route::all();
        $alert=Role::all();
        $notif=$notif;
        $check=collect([]);
        $hase=collect([]);
        $haserole=collect([]);
        foreach($user as $o){
            foreach($rout as $r){
                $cek=Hasrole::where('role_id',$o->id)->where('route_id',$r->id)->count();
                $has=Hasrole::where('role_id',$o->id)->where('route_id',$r->id)->first();
                if($cek>0){
                    $check->push([
                        'check'   =>'checked'
                    ]);

                    $haserole->push([
                        'id'   =>$has['id']
                    ]);
                }else{
                    $check->push([
                        'check'   =>''
                    ]);
                    $haserole->push([
                        'id'   =>''
                    ]);
                    
                }
                
                
                foreach(permision() as $p){
                    if($has['permision_id']==$p['id']){
                        $hase->push([
                            'selected'   =>'selected'
                        ]);
                    }else{
                        $hase->push([
                            'selected'   =>''
                        ]);
                    }
                }
                
            }
           
        }
        return view( 'user.index',compact('page','ketpage','url','user','notif','check','haserole','modaluser','alert','rout','hase'));
    }

    public function store(request $request, $act){
        $jum=count($request->route_id);
        $delete=Hasrole::where('role_id',$request->role_id)->delete();
        
        for($x=0;$x<$jum;$x++){
            if($request->route_id[$x]==''){

            }else{
                $data               = new Hasrole;
                $data->role_id      = $request->role_id;
                $data->route_id     = $request->route_id[$x];
                $data->permision_id = $request->permision_id[$x];
                $data->save();
                    
            }
        }
        echo 'ok';
    }

    public function store_role(request $request, $act){
        if (trim($request->name) == '') {$error[] = '-  Kolom Nama Role Harus diisi';}
        if (isset($error)) {echo '<b>Error</b>: <br />'.implode('<br />', $error);} 
        else{
            if($act=='new'){
                $datas               = new Role;
                $datas->name         = $request->name;
                $datas->save();

                // dd($request->nip);
                echo'ok';
            }else{
                $datas               = Role::find($request->id);
                $datas->name         = $request->name;
                $datas->save();
                echo'ok';
            }
        }
    }

    public function pdf(){
        $data = Golongan::all();
 
    	$pdf = PDF::loadview('pdf.golongan',['data'=>$data]);
    	return $pdf->stream();
    }

    public function download_pdf(){
        $data = Golongan::all();
 
    	$pdf = PDF::loadview('pdf.golongan',['data'=>$data]);
    	return $pdf->download();
    }

    public function delete($id){
        $pegawai = Role::where('id',$id)->delete();
        $detail = Hasrole::where('role_id',$id)->delete();
 
    }
}
