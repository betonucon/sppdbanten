<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class GroupController extends Controller
{
    public function view(){

    }

    public function save(request $request){
        $count=count($request->id);
        dd($count);
    }
}
