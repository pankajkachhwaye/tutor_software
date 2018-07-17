<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NewCourseAssigned;
use App\Mail\NewDailyWorkAssigned;
use App\Model\Branch;
use App\Model\DailyWorkReport;

use App\Model\Course;
use App\Model\Contact;
use App\Model\Semester;
use App\Model\StudentCoursePayHistory;
use App\Model\StudentDailyPayHistory;
use App\Model\Subject;
use App\Model\Week;
use App\Notifications\NewEntryDailyWork;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Response;
use App\User;
use App\Notifications\NewCourse;
use Illuminate\Support\Facades\Mail;

class DailyWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function add($id){
        $page = 'contact';
        return view('tutor.daily-work.dailyworkadd',compact('page','id'));
    }

    public function createDailyWork(Request $request){
        $validate = $this->validateRequest($request);
        if(count($validate) > 0){
            $message = implode(',', $validate);

            return redirect('daily-work-entry/show'.'#'.$request->redirect_hash)->with('returnStatus', true)->with('status', 101)->with('message', $message);
        }
        else{
            $temp_data = $request->all();
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
            $insert = DailyWorkReport::insertGetId($temp_data);
            $dailywork = DailyWorkReport::find($insert);
            $users = explode(',',$request->tutor_name);
            $session_id = Session::get('semester_id');
            foreach ($users as $value){
                $user = User::where('name',$value)->first();
                $user->notify(new NewEntryDailyWork($session_id,$dailywork,$request_hash));
                Mail::to($user->email)->queue(new NewDailyWorkAssigned($session_id,$dailywork,$request_hash,$user));
            }

                return redirect('daily-work-entry/show'.'#'.$request_hash)->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');

        }

    }

    public function validateRequest($request){
        $returnArray = [];
        $last_chr = substr($request->tutor_name, -1);
        if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $request->tutor_name) || preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/', $request->tutor_price)){
            array_push($returnArray,'No Special Character are allowed in Tutor Price and Tutor Name');

        }

       if (preg_match('([a-zA-Z])',$request->tutor_price)){
            array_push($returnArray,'No Letters are allowed in Tutor Price');
        }
       if ($last_chr == ','){
            array_push($returnArray,'Tutor Name has an extra comma please remove');
        }
        $explode_name = explode(",",$request->tutor_name);
        $explode_price = explode(",",$request->tutor_price);

        if(count($explode_name) != count($explode_price)){
            array_push($returnArray,'Tutor Name and Tutor price are mismatched please correct the error');
        }

        return $returnArray;
    }


    public function updateDailyWork(Request $request){
        $validate = $this->validateRequest($request);
        if(count($validate) > 0){
            $message = implode(',', $validate);

            return redirect('daily-work-entry/show'.'#'.$request->redirect_hash)->with('returnStatus', true)->with('status', 101)->with('message', $message);
        }
        else {
            $temp_data = $request->all();
//        $remaining = intval($temp_data['price']) - intval($temp_data['paid']);
            $id = $temp_data['did'];
            $tutor_name = $temp_data['tutor_name'];
            $tutor_price = $temp_data['tutor_price'];
            unset($temp_data['_token']);
            unset($temp_data['did']);
//        $temp_data['remaining'] = $remaining;
            $temp_data['tutor_name'] = json_encode($tutor_name);
            $temp_data['tutor_price'] = json_encode($tutor_price);
//        $temp_data['created_at'] = Carbon::now();
            $insert = DailyWorkReport::where('id', $id)->update($temp_data);


            if ($insert) {
                return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
            }
        }
    }

    public function show()
    {


        $temp = User::Select('name')->where('role','tutor')->get();
        $users = [];
        foreach ($temp as $user){
            array_push($users,$user->name);
        }
        $semester_id = Semester::find(Session::get('semester_id'));
           if($semester_id == null){
               return redirect('all-semesters')->with('returnStatus', true)->with('status', 101)->with('message', 'Please select semester');
           }
       $contactData= $semester_id->contacts()->orderBy('created_at','asc')->get();
        $weeks = $semester_id->weeks()->orderBy('created_at','asc')->get();
            $branches = Branch::all();
            $subjectsall = Subject::all();
        $branchjson = [];
        $subjects = [];
        foreach ($branches as $branch){
            array_push($branchjson,$branch->branch_name);
        }
        foreach ($subjectsall as $subject){
            array_push($subjects,$subject->subject_name);
        }
        return view('tutor.daily-work.student_details',compact('contactData','weeks','users','branches','branchjson','subjects'));

    }

    public function createCourse(Request $request )
    {

        $validate = $this->validateRequest($request);
        if(count($validate) > 0){
            $message = implode(',', $validate);

            return back()->with('returnStatus', true)->with('status', 101)->with('message', $message);
        }
        else {
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
            $insert = Course::insertGetId($temp_data);
            $course = Course::find($insert);
            $users = explode(',',$request->tutor_name);
            $session_id = Session::get('semester_id');
            foreach ($users as $value){
                $user = User::where('name',$value)->first();
                $user->notify(new NewCourse($session_id,$course,$request_hash));
                Mail::to($user->email)->queue(new NewCourseAssigned($session_id,$course,$request_hash,$user));
            }

            if ($insert) {
                return redirect('daily-work-entry/show' . '#' . $request_hash)->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
            }
        }
    }

    public function updateCourse(Request $request )
    {

        $validate = $this->validateRequest($request);
        if(count($validate) > 0){
            $message = implode(',', $validate);

            return back()->with('returnStatus', true)->with('status', 101)->with('message', $message);
        }
        else {
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

            $insert = Course::where('id', $id)->update($temp_data);

            if ($insert) {
                return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
            }
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
