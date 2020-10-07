<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uccello\Core\Models\Domain as UccelloDomain;

class Domain extends UccelloDomain
{
    
    public function site()
    {
        return $this->hasOne(Site::class);
    }

    public function domains(){
        return $this->hasMany(Domain::class, 'parent_id', 'id');
    }
}
