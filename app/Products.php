<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function oders_detail()
    {
        return $this->hasMany(OderDetail::class , 'product_id','id');
    }
}
