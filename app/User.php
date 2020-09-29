<?php

namespace App;

use App\Notifications\UserActivated;
use App\Notifications\UserCreated;
use App\Material;
use Illuminate\Support\Collection;
use Uccello\Core\Models\User as UccelloUser;

class User extends UccelloUser
{
    public static function boot()
    {
        parent::boot();
    }

    public function domains()
    {
        return $this->belongsTo(Domain::class);
    }

    public function materials()
    {
        $domains=[];
        
        foreach (auth()->user()->privileges()->get() as $privilege) {
            $domains[]=$privilege->domain()->first()->id;
        }
        $materials = Material::whereNotNull('domain_id')
            ->whereIn('domain_id', $domains);
        
        return $materials;
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'domain_id', 'domain_id');
    }

}
