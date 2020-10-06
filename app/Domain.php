<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table="uccello_domains";

    public function site()
    {
        return $this->hasOne(Site::class);
    }
}
