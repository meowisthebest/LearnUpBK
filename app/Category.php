<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;

    protected $table = 'tbl_category';

    protected $primaryKey = 'category_id';

    public function course(){
        return $this->hasMany('App\Course','category_id','category_id');
    }
}
