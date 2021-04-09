<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    protected $fillable=['project_id','title','slug','content','description','price','size','bed_rooms','bath_rooms','image','currency_id','status','height','width','left','top'];
}
