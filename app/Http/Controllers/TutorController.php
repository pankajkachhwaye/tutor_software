<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Contact;
use App\Model\Week;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Semester;


class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tutorAllSemester(){
        Session::forget('semester_id');
        $semesters = Semester::all();

        return view('tutor.semester.allsemestertutors',compact('semesters'));
    }

    public function showTutorDashboard($semester_id){
        Session::put('semester_id',$semester_id);
        return redirect('tutor-dashboard');
    }

    public function tutorDashboard(){

        $semester_id = Semester::find(Session::get('semester_id'));
        if($semester_id == null){
            return redirect('tutor-all-semester')->with('returnStatus', true)->with('status', 101)->with('message', 'Please select semester');
        }
        $contactData= $semester_id->contacts()->orderBy('created_at','asc')->get();
        $weeks = $semester_id->weeks()->orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
        //DailyWorkReport::all();
        //dd($id);

        return view('tutor.tutordashboard',compact('contactData','weeks'));
    }

    public function notifications(){
        $semester_id = Semester::find(Session::get('semester_id'));
        if($semester_id == null){
            return redirect('tutor-all-semester')->with('returnStatus', true)->with('status', 101)->with('message', 'Please select semester');
        }
        $contactData= $semester_id->contacts()->orderBy('created_at','asc')->get();
        $weeks = $semester_id->weeks()->orderBy('created_at','asc')->get();
        return view('tutor.notification',compact('contactData','weeks'));

    }

    public function showWeekReportTutor($id){

        $week = Week::find($id);
        $semester_id = Semester::find(Session::get('semester_id'));
        if($semester_id == null){
            return redirect('tutor-all-semester')->with('returnStatus', true)->with('status', 101)->with('message', 'Please select semester');
        }
        $contactData= $semester_id->contacts()->orderBy('created_at','asc')->get();
        $weeks = $semester_id->weeks()->orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
        //DailyWorkReport::all();
        //dd($id);

        return view('tutor.weeklytutor',compact('contactData','weeks','week'));
    }
}
