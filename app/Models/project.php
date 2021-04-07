<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class project extends Model
{
    use HasFactory;

    public static function FunctionSave($request){
        DB::beginTransaction();
        try {

            $saved = $request->project_id == "" ? new Project() : Project::find($request->project_id);
            $saved->name            = $request->name;
            $saved->plan            = $request->plan;
            $saved->description     = $request->description;
            $saved->content         = $request->content;
            $saved->Image           = $request->image;
            $saved->city            = $request->city;
            $saved->location        = $request->location;
            $saved->number_of_block = $request->number_block;
            $saved->number_of_floor = $request->number_floor;
            $saved->number_of_flat  = $request->number_flat;
            $saved->lowest_price    = $request->price_from;
            $saved->max_price       = $request->price_to;
            $saved->currency_id     = $request->currency;
            $saved->save();
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            DB::rollBack();
            return 0;
        }
    }
}
