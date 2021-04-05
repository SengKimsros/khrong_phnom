<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable=['home_id','first_name','last_name','phone','email','service_id','amount','currency_id','address','address','status','created_at','update_by'];
}
