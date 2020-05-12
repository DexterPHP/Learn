<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCater extends Model
{
    protected $table='sub_caters';
    protected $fillable=['id','title','title_en','logo','description','cater_id'];

    public function GetAllCourse(){
        return $this->hasMany('App\Models\Course','sub_cater');
    }
}
