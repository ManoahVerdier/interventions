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
        if (session('site') ?? false) {
            $site = Site::find(session('site'));
            $userMaterials = $site->materials()->with('productRanges')->get();
        } else {
            $userMaterials = auth()->user()->materials()->with('productRanges')->get();
        }
        $allMaterials = $this->materials()->get();
        
        return $allMaterials->intersect($userMaterials)->count();
    }
}
