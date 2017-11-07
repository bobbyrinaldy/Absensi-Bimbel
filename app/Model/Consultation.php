<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
  public function pengajar()
  {
      return $this->belongsTo('App\Model\Teacher', 'teacher_id');
  }
}
