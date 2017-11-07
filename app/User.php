<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kelompok()
    {
        return $this->hasMany('App\Model\Group', 'id');
    }

    public function regis()
    {
        return $this->hasMany('App\Model\Registration', 'id');
    }

    public function teacher()
    {
        return $this->hasMany('App\Model\Teacher', 'id');
    }
}
