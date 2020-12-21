<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChappterContent extends Model
{
    public $timestamps = false;

    protected $table = 'tbl_chappter_content';

    protected $primaryKey = 'chappter_content_id';

    public function chappter(){
        return $this->belongsTo('App\Chappter','chappter_content_id','chappter_content_id');
    }
}
