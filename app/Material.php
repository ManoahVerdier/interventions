<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function productRanges()
    {
        return $this->belongsTo(ProductRange::class,'product_range_id','id');
    }
}
