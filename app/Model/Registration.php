<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  public function administrasi()
    {
        return $this->hasOne('App\Model\Administration', 'registration_id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Model\Subgroup', 'registration_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
