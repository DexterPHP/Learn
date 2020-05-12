<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="courses";
    protected $fillable=['id','title','auther','desc','playlist_link','publish_at','count_of_videos','language','sub_cater','logo','fulldata'];
    public function subCat(){
        return $this->hasMany('App\Models\Course','id');
    }
}
