<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Uccello\Core\Database\Eloquent\Model;
use Uccello\Core\Support\Traits\UccelloModule;

class Order extends Model
{
    use SoftDeletes;
    use UccelloModule;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'total_ht',
        'total_ttc',
        'status',
        'domain_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function lines()
    {
        return $this->hasMany(OrderLine::class);
    }

    /**
    * Returns record label
    *
    * @return string
    */
    public function getRecordLabelAttribute() : string
    {
        return $this->id;
    }
}
