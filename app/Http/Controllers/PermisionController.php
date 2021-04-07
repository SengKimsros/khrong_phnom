<?php

namespace App\Http\Controllers;

use App\Models\permision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=$request->id;
        $sql="SELECT id,name,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=4 and permisions.position_id=$id LIMIT 1) as _view,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=1 and permisions.position_id=$id LIMIT 1) as _add,
        (SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=2 and permisions.position_id=$id LIMIT 1) as _update,(SELECT COUNT(*) FROM permisions WHERE tables.id=permisions.table_id and permisions.permission_type_id=3 and permisions.position_id=$id LIMIT 1) as _delete FROM tables";
        $role_permission=DB::select($sql);
        return response()->json(['success'=>$role_permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data=[
                'table_id'=>$request->table_id,
                'position_id'=>$request->position_id,
                'permission_type_id'=>$request->permission_type_id,
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ];
            if($request->checked==1){
                DB::table('permisions')->insert($data);
                $message="Permission Inserted !!";
            }else{
                DB::delete('delete from permisions where table_id = ? and position_id=? and permission_type_id=?', [$request->table_id,$request->position_id,$request->permission_type_id]);
                $message="Permission Deleted !!";
            }

            DB::commit();
            return response()->json(['success'=>$message]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permision  $permision
     * @return \Illuminate\Http\Response
     */
    public function show(permision $permision,Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permision  $permision
     * @return \Illuminate\Http\Response
     */
    public function edit(permision $permision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permision  $permision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permision $permision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permision  $permision
     * @return \Illuminate\Http\Response
     */
    public function destroy(permision $permision)
    {
        //
    }
}
