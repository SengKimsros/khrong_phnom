<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\admin\position;
use App\Models\role;
use App\Models\table;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT id,name,(SELECT COUNT(*) 
        FROM permisions WHERE tables.id = permisions.table_id and permisions.permission_type_id = 4 and permisions.position_id = 1 LIMIT 1) as _view,(SELECT COUNT(*) 
        FROM permisions WHERE tables.id = permisions.table_id and permisions.permission_type_id = 1 and permisions.position_id = 1 LIMIT 1) as _add,
        (SELECT COUNT(*) FROM permisions 
        WHERE tables.id = permisions.table_id and permisions.permission_type_id=2 and permisions.position_id=1 LIMIT 1) as _update,(SELECT COUNT(*) 
        FROM permisions WHERE tables.id = permisions.table_id and permisions.permission_type_id = 3 and permisions.position_id = 1 LIMIT 1) as _delete 
        FROM tables";
        $role_permission = DB::select($sql);
        
        $role = position::where('status',1)->orderBy('id')->get();
        $row = DB::table('posts')->where('status',1)->orderBy('id')->get();
        return view('admin.post.post',['rows'=>$row,'role'=>$role,'table'=>$role_permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saved = Post::savePost($request);
        echo 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.post-add',['rows'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->update(['status'=>0]);
        return response()->json(['success'=>1]);
    }

    public function testIPanorama(){
        return view('admin.post.test');
    }
}
