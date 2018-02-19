<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    protected $table = 'contact';

    public function dailyWorkReport(){
        return $this->hasMany('App\Model\DailyWorkReport','contact_id');
    }

    public function dailyWorkReportChunkOnWeek(){
//        $fromDate = Carbon::now()->subDay()->startOfWeek()->toDateTimeString();//toDateString(); // or ->format(..)
        $fromDate = $one_week_ago = Carbon::now()->subWeeks(1);//toDateString(); // or ->format(..)
        $tillDate = Carbon::now()->toDateTimeString();
//        Carbon::parse($date->created_at)->format('W');

        return $this->hasMany('App\Model\DailyWorkReport','contact_id')
            ->where('created_at','>=',$fromDate)->where('created_at','<=',$tillDate);
    }

    public function scopeChunksOnWeek($query,$fromDate,$endDate){
//        $fromDate = Carbon::now()->subWeeks($week_number);//toDateString(); // or ->format(..)
//        $tillDate = Carbon::now()->toDateTimeString();
        return $query->where('created_at','>=',$fromDate)->where('created_at','<=',$endDate);
    }

    public function groupDailyWorkReport(){
        return $this->hasMany('App\Model\DailyWorkReport','contact_id')->groupBy('student_name');
    }

    public function courses(){
        return $this->hasMany('App\Model\Course','contact_id');
    }
}
