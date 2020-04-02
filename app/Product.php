<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Uccello\Core\Database\Eloquent\Model;
use Uccello\Core\Support\Traits\UccelloModule;

class Product extends Model
{
    use SoftDeletes;
    use UccelloModule;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(\App\Category::class);
    }

    /**
    * Returns record label
    *
    * @return string
    */
    public function getRecordLabelAttribute() : string
    {
        return $this->name ?? $this->id;
    }
}
