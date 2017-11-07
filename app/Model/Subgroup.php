<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subgroup extends Model
{
  protected $fillable = [
        'group_id','registration_id'
    ];
    public function siswa()
    {
        return $this->belongsTo('App\Model\Registration', 'id');
    }

    public function kelompok()
    {
        return $this->hasMany('App\Model\Group', 'id');
    }
}
