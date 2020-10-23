<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;
    
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
