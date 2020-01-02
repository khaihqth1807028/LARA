<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oders extends Model
{
    protected $table = "oders";
    public function oder_detail()
    {
        return $this->hasMany('App\OderDetail','order_id','id');
    }
    public function customers() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
