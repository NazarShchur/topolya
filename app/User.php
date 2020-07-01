<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function role(){
        $this->belongsTo('App\Model\Role');
    }
}
