<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Uccello\Core\Support\Traits\UccelloModule;

class CodePromo extends Model
{
    use UccelloModule;
    use SoftDeletes;
    
    /**
    * Returns record label
    *
    * @return string
    */
    public function getRecordLabelAttribute() : string
    {
        return trim($this->first_name.' '.$this->last_name);
    }
}