<?php

function route_pegawai($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',1)->count();
    return $data;

}
function permision_pegawai($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',1)->first();
    return $data['permision_id'];

}
function route_surat_tugas($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',2)->count();
    return $data;
}
function permision_surat_tugas($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',2)->first();
    return $data['permision_id'];
}
function route_kwitansi($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',3)->count();
    return $data;
}
function permision_kwitansi($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',3)->first();
    return $data['permision_id'];

}
function route_kegiatan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',4)->count();
    return $data;
}
function permision_kegiatan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',4)->first();
    return $data['permision_id'];

}
function route_bidang($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',7)->count();
    return $data;
}
function permision_bidang($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',7)->first();
    return $data['permision_id'];

}
function route_golongan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',8)->count();
    return $data;
}
function permision_golongan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',8)->first();
    return $data['permision_id'];

}
function route_ssh($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',9)->count();
    return $data;
}
function permision_ssh($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',9)->first();
    return $data['permision_id'];

}
function route_jasa($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',10)->count();
    return $data;
}
function permision_jasa($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',10)->first();
    return $data['permision_id'];

}
function route_pengaturan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',11)->count();
    return $data;
}

function permision_pengaturan($id){
    $data=App\Hasrole::where('role_id',$id)->where('route_id',11)->first();
    return $data['permision_id'];

}

