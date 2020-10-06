<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domain;
use Uccello\Core\Models\Domain as UccelloDomain;

class Privilege extends Model
{
    protected $table="uccello_privileges"; 
    
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
