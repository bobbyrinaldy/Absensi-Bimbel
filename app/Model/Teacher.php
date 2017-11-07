<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  public function absen()
  {
      return $this->hasOne('App\Model\Absence', 'id');
  }

  public function consult()
  {
      return $this->hasOne('App\Model\Consultation', 'id');
  }

  public function user()
  {
      return $this->belongsTo('App\User', 'user_id');
  }
}
