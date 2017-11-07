<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subconsult extends Model
{
    protected $table = 'subconsult';
    public $timestamps = false;
    protected $fillable = [
          'consultation_id','registration_id'
      ];


}
