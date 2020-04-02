<?php

namespace App;

use Uccello\Core\Models\User as UccelloUser;

class User extends UccelloUser
{
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
