<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Uccello\Core\Database\Eloquent\Model;
use Uccello\Core\Support\Traits\UccelloModule;

class Product extends Model implements Searchable
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

    public $searchableType = 'product';

    public $searchableColumns = [
        'name',
    ];

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->recordLabel
        );
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(\App\Brand::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getAmountHTAfterDiscountAttribute()
    {
        return $this->discount ? $this->amount_ht - ($this->amount_ht * $this->discount / 100) : $this->amount_ht;
    }

    public function getAmountTTCAfterDiscountAttribute()
    {
        return $this->discount ? $this->amount_ttc - ($this->amount_ttc * $this->discount / 100) : $this->amount_ttc;
    }

    public function getIsUserFavoriteAttribute()
    {
        return $this->favorites->where('user_id', auth()->id())->count() > 0;
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
