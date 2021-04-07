<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    public static function FunctionSave($request){
        // DB::beginTransaction();
        // try {
            $arr_facility = $request->arrFacility;
            $arr_item_detail = [];
            if($arr_facility){
                foreach($arr_facility as $k=> $row){
                    $arr_item_detail[$k]=[
                        "key" => $row['select_facility'],
                        "value"  => $row['distance'] ,
                    ];
                }    
            }
           
            $features = $request->features;
            $arrFeatures = [];
            if($features){
                foreach($features as $row){
                    $arrFeatures[]=$row['features'];
                }
            }
            
            $saved = $request->project_id == "" ? new Project() : Project::find($request->project_id);
            $saved->name            = $request->name;
            $saved->plan            = $request->plan;
            $saved->descrition      = $request->descrition;
            $saved->content         = $request->content;
            $saved->Image           = $request->image;
            $saved->city            = $request->city;
            $saved->location        = $request->location;
            $saved->number_blocks   = $request->number_block;
            $saved->number_floors   = $request->number_floor;
            $saved->number_flats    = $request->number_flat;
            $saved->lowest_price    = $request->price_from;
            $saved->max_price       = $request->price_to;
            $saved->currency        = $request->currency;
            $saved->facility        = json_encode($arr_item_detail);
            $saved->features        = json_encode($arrFeatures);
            $saved->seo_title       = $request->seo_title;
            $saved->seo_description = $request->seo_descript;
            $saved->save();
        //     DB::commit();
        //     return 1;
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return 0;
        // }
    }
}
