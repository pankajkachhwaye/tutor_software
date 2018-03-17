<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
use App\Model\Week;


class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tutorDashboard(){

        $contactData= Contact::orderBy('created_at','asc')->get();
        $weeks = Week::orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
        //DailyWorkReport::all();
        //dd($id);

        return view('tutor.tutordashboard',compact('contactData','weeks'));
    }

    public function showWeekReportTutor($id){

        $week = Week::find($id);
        $contactData= Contact::orderBy('created_at','asc')->get();
        $weeks = Week::orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
        //DailyWorkReport::all();
        //dd($id);

        return view('tutor.weeklytutor',compact('contactData','weeks','week'));
    }
}
