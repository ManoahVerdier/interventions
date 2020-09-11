<?php

namespace App;

use App\Notifications\UserActivated;
use App\Notifications\UserCreated;
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
        return $this->hasMany(Material::class, 'domain_id', 'domain_id');
    }

}
