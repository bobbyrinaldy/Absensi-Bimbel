<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function subgroup()
  {
      return $this->hasMany('App\Model\Subgroup', 'group_id');
  }

  public function absen()
  {
      return $this->hasOne('App\Model\Absence', 'id');
  }

  public function user()
  {
      return $this->belongsTo('App\User', 'user_id');
  }
}
