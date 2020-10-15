<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function domain()
    {
        return $this->hasMany(Material::class);
    }
}
