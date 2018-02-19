<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $table = 'weeks';
}
//0 -allocated
//-1 -unlocated
//1 -completed