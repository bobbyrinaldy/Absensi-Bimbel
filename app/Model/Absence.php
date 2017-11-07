<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
  public function kelompok()
  {
      return $this->belongsTo('App\Model\Group', 'group_id');
  }

  public function pengajar()
  {
      return $this->belongsTo('App\Model\Teacher', 'teacher_id');
  }
}
