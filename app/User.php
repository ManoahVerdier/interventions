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

        // Link to parent record
        static::created(function ($model) {
            static::sendUserCreatedEmail($model);
        });

        static::updated(function ($model) {
            static::sendUserActivatedEmail($model);
        });
    }

    protected static function sendUserCreatedEmail($model)
    {
        // Check if user have to be activated
        if ($model->is_active) {
            return;
        }

        $usersToNotify = explode(';', env('USERS_TO_NOTIFY_AFTER_REGISTRATION'));
        if ($usersToNotify) {
            foreach ($usersToNotify as $userName) {
                $user = User::where('username', trim($userName))->first();

                if ($user) {
                    $user->notify(new UserCreated($model));
                }
            }
        }
    }

    protected static function sendUserActivatedEmail($model)
    {
        // Check if user was just activated
        if ($model->is_active && $model->getOriginal('is_active') === 0) {
            $model->notify(new UserActivated());
        }
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
