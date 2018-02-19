<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeChunksOnWeek($query,$fromDate,$endDate){
//        $fromDate = Carbon::now()->subWeeks($week_number);//toDateString(); // or ->format(..)
//        $tillDate = Carbon::now()->toDateTimeString();
        return $query->where('created_at','>=',$fromDate)->where('created_at','<=',$endDate);
    }
}
