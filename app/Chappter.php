<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chappter extends Model
{
    public $timestamps = false;

    protected $table = 'tbl_chappter';

    protected $primaryKey = 'chappter_id';

    public function course(){
        return $this->belongsTo('App\Course','course_id','course_id');
    }

    public function chappterContent(){
        return $this->hasMany('App\ChappterContent','chappter_id','chappter_id');
    }
}
