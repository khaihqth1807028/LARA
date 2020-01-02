<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    public function products(){
        return $this->belongsTo('App\Products','product_id','id');
    }
    public function oders(){
        return $this->belongsTo('App\Oders','order_id','id');
    }
}
