<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    public function subjects(){
        return $this->hasMany('App\Model\Subject','branch_id');
    }
}
