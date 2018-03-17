<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DailyWorkReport extends Model
{
   protected $table = 'daily_work';

    public function scopeChunksOnWeek($query,$fromDate,$endDate){
        return $query->where('created_at','>=',$fromDate)->where('created_at','<=',$endDate);
    }

//    public function scopeByUserName
}
