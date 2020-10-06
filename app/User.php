<?php

namespace App;

use App\Notifications\UserActivated;
use App\Notifications\UserCreated;
use App\Material;
use Illuminate\Support\Collection;
use Uccello\Core\Models\User as UccelloUser;
use Uccello\Core\Models\Domain as UccelloDomain;
use App\Domain;

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

    public function sites()
    {
        $sites=[];
        
        foreach (auth()->user()->privileges()->get() as $privilege) {
            $sites[]=$privilege->domain()->first()->site()->first();
        }
        
        return collect($sites);
    }

    public function materials()
    {
        $domains=[];
        
        $domain_id = Site::find(session('site'))->domain()->first()->id;

        $materials = Material::whereNotNull('domain_id')
            ->where('domain_id', $domain_id);
        
        return $materials;
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'domain_id', 'domain_id');
    }

    public function privileges()
    {
        return $this->hasMany(Privilege::class);
    }

}
