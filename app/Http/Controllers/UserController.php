<?php

namespace App\Http\Controllers;

use App\Models\admin\position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=DB::table('users')->select('users.id','users.name as username','users.first_name','users.last_name','users.gender','users.phone','users.email','positions.name as position_name','users.profile_photo_path')
        ->join('positions','users.position_id','positions.id')
        ->where('users.status',1)
        ->get();
        return view('admin.customer.customer',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position=position::all();
        return view('admin.customer.customer-add',['position'=>$position]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender'=>'required',
            'position'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required'
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('profile')) {
                $filenameWithExt = $request->file('profile')->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('profile')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'. time().'.'.$extension;
                // $path = $request->file('profile')->storeAs('public/image', $fileNameToStore);
                $path=$request->file('profile')->move('public/image/user-profile', $fileNameToStore);
            }else{
                $path='';
            }
            $data=[
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'name'=>$request->first_name.' '.$request->last_name,
                'gender'=>$request->gender,
                'position_id'=>$request->position,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'profile_photo_path'=>$path,
                'phone'=>$request->phone,
                'status'=>1
            ];

            DB::table('users')->insert($data);
            DB::commit();
            return redirect('/admin/user')->with('success', 'User is inserted  !!');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $position=position::all();
        $user=User::where('id',$id)->first();
        return view('admin.customer.customer-add',['position'=>$position,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'position'=>'required',
            'phone'=>'required'
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('profile')) {
                $filenameWithExt = $request->file('profile')->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('profile')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'. time().'.'.$extension;
                $path=$request->file('profile')->move('public/image/user-profile', $fileNameToStore);
            }else{
                $path=$request->profile_hidden;
            }
            if(strlen($request->password)>0){
                $password=Hash::make($request->password);
            }else{
                $password=$request->password_hidden;
            }
            $data=[
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'name'=>$request->first_name.' '.$request->last_name,
                'gender'=>$request->gender,
                'position_id'=>$request->position,
                'email'=>$request->email,
                'password'=>$password,
                'profile_photo_path'=>$path,
                'phone'=>$request->phone

            ];

            DB::table('users')->where('id',$id)->update($data);
            DB::commit();
            return redirect('/admin/user')->with('status', 'User is inserted  !!');
        } catch (\Throwable $th) {
            // DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::table('users')->where('id',$id)->update(['status'=>0]);
            DB::commit();
            return redirect()->route('admin/user')->with(['status'=>'User is Deleted  !!']);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;

        }
    }
}
