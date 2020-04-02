<?php

namespace App;

use Gzero\EloquentTree\Model\Tree;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Uccello\Core\Support\Traits\UccelloModule;

class Category extends Tree implements Searchable
{
    use SoftDeletes;
    use UccelloModule;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $searchableType = 'category';

    public $searchableColumns = [
        'name'
    ];

    /**
     * Check if node is root
     * This function check foreign key field
     *
     * @return bool
     */
    public function isRoot()
    {
        // return (empty($this->{$this->getTreeColumn('parent')})) ? true : false;
        return $this->{$this->getTreeColumn('path')} === $this->getKey() . '/'
                && $this->{$this->getTreeColumn('level')} === 0;
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->recordLabel
        );
    }

    public function parent()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function children()
    {
        return $this->hasMany(\App\Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    /**
    * Returns record label
    *
    * @return string
    */
    public function getRecordLabelAttribute() : string
    {
        return $this->name ?? $this->id ?? '';
    }
}
