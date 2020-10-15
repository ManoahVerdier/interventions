<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
