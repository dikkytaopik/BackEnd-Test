<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = ['email', 'password','created_at'];

    public function profile() {
        return $this->hasOne(Profile::class);
    }
}
