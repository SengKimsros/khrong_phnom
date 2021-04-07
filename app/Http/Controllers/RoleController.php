<?php

namespace App\Http\Controllers;

use App\Models\admin\position;
use App\Models\role;
use App\Models\table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $iduser=RolePermission(1);
        // dd($iduser);
        $sql="SELECT id,name,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=4 and permisions.position_id=1 LIMIT 1) as _view,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=1 and permisions.position_id=1 LIMIT 1) as _add,
        (SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=2 and permisions.position_id=1 LIMIT 1) as _update,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=3 and permisions.position_id=1 LIMIT 1) as _delete FROM tables";
        $role_permission=DB::select($sql);
        $role=position::where('status',1)->orderBy('id')->get();
        return view('admin.role_permission.role',['role'=>$role,'table'=>$role_permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('admin.role_permission.role-add')->with(['table'=>$table]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        //
    }
}
