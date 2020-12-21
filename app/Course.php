<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     //
     public $timestamps = false;

     protected $table = 'tbl_course';
 
     protected $primaryKey = 'course_id';
 
     public function category(){
         return $this->belongsTo('App\Category','category_id','category_id');
     }

     public function chappter(){
        return $this->hasMany('App\Chappter','course_id','course_id');
    }
}
