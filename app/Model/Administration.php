<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
  public function registrasi()
    {
        return $this->belongsTo('App\Model\Registration', 'id');
    }
}
