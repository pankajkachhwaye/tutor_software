<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    public function branch(){
        return $this->belongsTo('App\Model\Branch','branch_id');
    }
}
