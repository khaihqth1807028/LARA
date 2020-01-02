<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey ="id";
    protected $guarded=[];
    public function oders(){
        return $this->belongsTo('App\Oders','customer_id','id');
    }
    public function oder_customer(){
        return $this->hasMany(oders::class);
    }
}
