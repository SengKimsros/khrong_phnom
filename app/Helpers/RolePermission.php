<?php
use Illuminate\Support\Facades\Auth;
use App\Models\permision;

function menu(){
    $menu=[

    ];
}

function RolePermission($table_id,$permission){
    $user_id=Auth::user()->position_id;
    $add=permision::where([
        ['table_id',$table_id],
        ['position_id',$user_id],
        ['permission_type_id',$permission]
    ])->get();
    if(count($add)>0){
        return true;
    }else{
        return false;
    }
}
