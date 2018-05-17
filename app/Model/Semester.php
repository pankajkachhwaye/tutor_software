<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';

    public function contacts(){
        return $this->hasMany('App\Model\Contact','semester_id');
    }
    public function weeks(){
        return $this->hasMany('App\Model\Week','semester_id');
    }
}
