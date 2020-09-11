<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRange extends Model
{
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function children()
    {
        return $this->hasMany(SubProductRange::class);
    }

    public function countUser()
    {
        $allMaterials = $this->materials()->get();
        $userMaterials = auth()->user()->materials()->with('productRanges')->get();
        return $allMaterials->intersect($userMaterials)->count();
    }
}
