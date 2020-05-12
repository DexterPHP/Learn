<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCater extends Model
{
    protected $table='main_caters';
    protected $fillable=['id','title','description','image_link','forNav','icon_link'];

    public function GetMainCater(){
        return $this->hasMany('App\Models\SubCater','cater_id');
    }
}
