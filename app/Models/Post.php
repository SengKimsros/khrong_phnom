<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
   static public function savePost($request){
        DB::beginTransaction();
        try {
            $saved = $request->post_id == "" ? new Post() : Post::find($request->post_id);
            $saved->title           = $request->title;
            $saved->slug            = $request->slug;
            $saved->content         = $request->content;
            $saved->post_thumbnail  = $request->post_thumbnail;
            $saved->status          = 1;
            $saved->save();
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollBack();
            return 0;
        }
    }
}
