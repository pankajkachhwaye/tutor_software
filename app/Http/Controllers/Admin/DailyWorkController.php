<?php

namespace App\Http\Controllers\Admin;

use App\Model\DailyWorkReport;

use App\Model\Course;
use App\Model\Contact;
use App\Model\StudentCoursePayHistory;
use App\Model\StudentDailyPayHistory;
use App\Model\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class DailyWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add($id){
        $page = 'contact';
        return view('tutor.daily-work.dailyworkadd',compact('page','id'));
    }

    public function createDailyWork(Request $request){

        $temp_data = $request->all();
//        dd($temp_data);
        $remaining = intval($temp_data['price']) - intval($temp_data['paid']);
        $tutor_name = $temp_data['tutor_name'];
        $tutor_price = $temp_data['tutor_price'];
        $request_hash = $temp_data['redirect_hash'];
        unset($temp_data['redirect_hash']);
        unset($temp_data['_token']);
        unset($temp_data['counter']);
        $temp_data['remaining'] = $remaining;
        $temp_data['tutor_name'] = json_encode($tutor_name);
        $temp_data['tutor_price'] = json_encode($tutor_price);
        $temp_data['created_at'] = Carbon::now();
        $insert = DailyWorkReport::insert($temp_data);



        if($insert){
            return redirect('daily-work-entry/show'.'#'.$request_hash)->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
        }
    }


    public function updateDailyWork(Request $request){
        $temp_data = $request->all();
        $remaining = intval($temp_data['price']) - intval($temp_data['paid']);
        $id = $temp_data['did'];
        $tutor_name = $temp_data['tutor_name'];
        $tutor_price = $temp_data['tutor_price'];
        unset($temp_data['_token']);
        unset($temp_data['did']);
        $temp_data['remaining'] = $remaining;
        $temp_data['tutor_name'] = json_encode($tutor_name);
        $temp_data['tutor_price'] = json_encode($tutor_price);
//        $temp_data['created_at'] = Carbon::now();
        $insert = DailyWorkReport::where('id',$id)->update($temp_data);



        if($insert){
            return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
        }
    }

    public function show()
    {

       $contactData= Contact::orderBy('created_at','asc')->get();
        $weeks = Week::orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
       //DailyWorkReport::all();
        //dd($id);

        return view('tutor.daily-work.student_details',compact('contactData','weeks'));

    }

    public function createCourse(Request $request )
    {

        //         dd($request->all());
        $temp_data = $request->all();
        $tutor_name = $temp_data['tutor_name'];
        $tutor_price = $temp_data['tutor_price'];
        $request_hash = $temp_data['redirect_hash'];
        unset($temp_data['redirect_hash']);
        unset($temp_data['_token']);
        unset($temp_data['counter']);
        $remaining = intval($temp_data['price']) - intval($temp_data['paid']);
        $temp_data['remaining'] = $remaining;
        $temp_data['tutor_name'] = json_encode($tutor_name);
        $temp_data['tutor_price'] = json_encode($tutor_price);
        $temp_data['created_at'] = Carbon::now();
        $insert = Course::insert($temp_data);

        if($insert){
            return redirect('daily-work-entry/show'.'#'.$request_hash)->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
        }
    }

    public function updateCourse(Request $request )
    {

        //         dd($request->all());
        $temp_data = $request->all();
        $id = $temp_data['cid'];
        $tutor_name = $temp_data['tutor_name'];
        $tutor_price = $temp_data['tutor_price'];
        unset($temp_data['_token']);
        unset($temp_data['cid']);
        $remaining = intval($temp_data['price']) - intval($temp_data['paid']);
        $temp_data['remaining'] = $remaining;
        $temp_data['tutor_name'] = json_encode($tutor_name);
        $temp_data['tutor_price'] = json_encode($tutor_price);

        $insert = Course::where('id',$id)->update($temp_data);

        if($insert){
            return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
        }
    }


    public function payDailyWork(Request $request){

        $data = DailyWorkReport::where('student_name',$request->student_name)->where('remaining', '!=' , 0)->orderBy('created_at','asc')->get();
        $ammount = $request->amount;
        $insertdata = [
            'paid_amount' => $ammount,
            'student_name' => $data[0]->student_name,
            'phone_no' => $request->phone_no,
            'name' => $request->name,
            'created_at' => Carbon::now()
        ];
        StudentDailyPayHistory::insert($insertdata);
        foreach ($data as $key => $value){
            if($value->remaining > $ammount){
                $minus_amt = intval($value->remaining) - intval($ammount);
                $value->remaining = $minus_amt;
                $value->save();
                    break;
            }
            else{
                $ammount = intval($ammount) - intval($value->remaining);
                $value->remaining = 0;
                $value->save();

            }
         }
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
    }

    public function editDailyWork($id){
        $data = DailyWorkReport::find($id);
        $temp = $data->toArray();
        $tutor_name = json_decode($temp['tutor_name']);
        $tutor_price = json_decode($temp['tutor_price']);
        $temp['tutor_name'] = $tutor_name;
        $temp['tutor_price'] = $tutor_price;
        return Response::json($temp);
    }
    public function editCourse($id){
        $data = Course::find($id);
        $temp = $data->toArray();
        $tutor_name = json_decode($temp['tutor_name']);
        $tutor_price = json_decode($temp['tutor_price']);
        $temp['tutor_name'] = $tutor_name;
        $temp['tutor_price'] = $tutor_price;
        return Response::json($temp);
    }


    public function payCourse(Request $request){

        $data = Course::where('student_name',$request->student_name)->where('remaining', '!=' , 0)->orderBy('created_at','asc')->get();
        $ammount = $request->amount;
        $insertdata = [
            'paid_amount' => $ammount,
            'student_name' => $data[0]->student_name,
            'phone_no' => $request->phone_no,
            'name' => $request->name,
            'created_at' => Carbon::now()
        ];
        StudentCoursePayHistory::insert($insertdata);
        foreach ($data as $key => $value){
            if($value->remaining > $ammount){
                $minus_amt = intval($value->remaining) - intval($ammount);
                $value->remaining = $minus_amt;
                $value->save();
                break;
            }
            else{
                $ammount = intval($ammount) - intval($value->remaining);
                $value->remaining = 0;
                $value->save();
            }
        }
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
    }

    public function addCourse($id)
    {

        $page = 'contact';
        return view('tutor.daily-work.dailycourse',compact('page','id'));
    }


    public function deleteDailyWork($id){
        $dailywork = DailyWorkReport::find($id);
        $dailywork->delete();
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Delete successfully');
    }

    public function deleteCourse($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Course Delete successfully');
    }

}
