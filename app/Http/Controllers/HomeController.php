<?php

namespace App\Http\Controllers;

use App\Models\home;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home.home',['home'=>home::where('status',1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project=project::where('status',1)->get();
        return view('admin.home.home-add',['project'=>$project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
       $data= $request->validate([
            'project_id'=>'required',
            'title'=>'required',
            'price'=>'required',
            'size'=>'required',
            'bed_rooms'=>'required',
            'bath_rooms'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=>'required',
            'fm_top'=>'required',
            'fm_left'=>'required',
            'fm_height'=>'required',
            'fm_width'=>'required'
        ]);
        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store("home_image");
        }
        $data['slug']=Str::of($request->title)->slug('-');
        $data['top']=str_replace('px','',$request->fm_top);
        $data['left']=str_replace('px','',$request->fm_left);
        $data['width']=$request->fm_width;
        $data['height']=$request->fm_height;
        $data['status']=1;
        $data['description']=$request->description;
        home::create($data);
        return redirect('admin/home')->with(['status'=>'Insert Successfully  !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(home $home)
    {
        $sql="select homes.*,projects.id as project_id,projects.plan,projects.name as project_name from homes INNER JOIN projects on homes.project_id=projects.id where homes.id=".$home['id'];
        $home=DB::select($sql);
        return view('admin.home.home-edit',['home'=>$home]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(home $home)
    {
        //
    }


    public function getHomeListByThumbnailId($id){
        try {
            $data=DB::table('homes')->where([
                    ['project_id','=',$id],
                    ['status','=',1]
                ])->get();
            $datas=array();
            foreach($data as $plan){
                $datas[]=[
                    'top'=>$plan->top,
                    'left'=>$plan->left,
                    'width'=>$plan->width,
                    'height'=>$plan->height,
                    'title'=>$plan->title,
                    "editable"=> false,
                ];
            }

            return response()->json(['note'=>$data]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
