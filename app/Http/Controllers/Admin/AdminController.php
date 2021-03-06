<?php

namespace App\Http\Controllers\Admin;

use App\Model\Branch;
use App\Model\Contact;
use App\Model\Semester;
use App\Model\StudentCoursePayHistory;
use App\Model\StudentDailyPayHistory;
use App\Model\Subject;
use App\Model\Week;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function addEmployee(){
        $contactData = Contact::all();
        return view('tutor.admin.addemployee',compact('contactData'));
    }


    public function employeeRegister(Request $request){
        $check = User::UserByNameEmail($request->name,$request->email)->first();
        if($check != null){
            return back()->with('status', 400)->with('message', 'User already register with this name and email');
        }
        else{
            $this->createNewEmployee($request);
            return back()->with('status', 100)->with('message', 'User register successfully');
        }
    }

    public function createNewEmployee($request){
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>bcrypt('123456'),
            'role'=>'employee',
            'created_at' =>Carbon::now()
        ]);
    }

    public function changeCdminCredentials(Request $request){
        $id = Auth::user()->id;
        $temp_data = $request->all();
        unset($temp_data['password_confirm']);
        unset($temp_data['_token']);
        $temp_data['password'] = Hash::make($temp_data['password']);

        User::find($id)->update($temp_data);
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Admin Credentials Update successfully');
    }

    public function addNewBranch(Request $request){

        $branch = Branch::where('branch_name',$request->branch_name)->first();
        if($branch != null){
            return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Branch with this name is already exist');
        }
        Branch::insert(['branch_name' => $request->branch_name,'created_at' => Carbon::now()]);
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Branch added successfully');
    }

    public function showSubjects($id){
        $subjetcs = Branch::with(['subjects'])->find($id);
        $branches = Branch::all();
        return view('tutor.daily-work.showsubjects',compact('subjetcs','branches'));
    }

    public function editBranch($id){
        $branch = Branch::find($id);

        return Response::json($branch);
    }

    public function editSubject($id){
        $branch = Subject::with(['branch'])->find($id);

        return Response::json($branch);
    }

    public function updateBranch(Request $request){
        $data = [
            'branch_name' => $request->branch_name,
            'updated_at' => Carbon::now()
        ];

        Branch::where('id',$request->branch_id)->update($data);
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Branch updated successfully');
    }

    public function updateSubject(Request $request){
        $data = [
            'subject_name' => $request->subject_name,
            'updated_at' => Carbon::now()
        ];

        Subject::where('id',$request->subject_id)->update($data);
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Subject updated successfully');
    }

    public function addNewSubject(Request $request){
//        dd($request->all());
        $branch = Subject::where('subject_name',$request->subject_name)->first();
        if($branch != null){
            return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Subject with this name is already exist');
        }
        Subject::insert(['branch_id'=>$request->branch_id,'subject_name' => $request->subject_name,'created_at' => Carbon::now()]);
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Subject added successfully');

  }

    public function allSemesters(){
        Session::forget('semester_id');
        $semesters = Semester::all();

        return view('tutor.semester.allsemester',compact('semesters'));
    }

    public function showSemesterData($semester_id){
        Session::put('semester_id',$semester_id);
        return redirect('daily-work-entry/show');
    }

    public function addNewSemester(Request $request){
        $check = Semester::where('semester_name',$request->semester_name)->first();
        if($check == null){
            Semester::insert(['semester_name' =>$request->semester_name,'created_at' => Carbon::now()]);
            return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Semester register successfully');
        }
        else{
            return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Semester already register with this name');
        }

    }

    public function index(){
        $page = 'dashboard';
        return view('tutor.admin.dashboard', compact('page'));
    }


    public function editTutor($id){
        $user = User::find($id);
        return Response::json($user);
    }

    public function registerTutor(){
        $tutors = User::where('role','tutor')->orderBy('created_at','desc')->get();
        $contactData= Contact::orderBy('created_at','asc')->get();
        $weeks = Week::orderBy('created_at','asc')->get();
        return view('tutor.daily-work.registertutor',compact('contactData','weeks','tutors'));
    }

    public function addNewTutor(Request $request){
        $check = User::UserByNameEmail($request->name,$request->email)->first();
        if($check != null){
            return back()->with('status', 400)->with('message', 'User already register with this name and email');
        }
        else{
            $this->createUser($request);
            return back()->with('status', 100)->with('message', 'User register successfully');
        }
    }

    public function updateTutor(Request $request){
             $id = $request->id;
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            User::where('id',$id)->update($data);
            return back()->with('status', 100)->with('message', 'User Update successfully');

    }

    protected function createUser($request){
        User::insert([
           'name'=>$request->name,
           'email'=>$request->email,
           'notify_email' => $request->notify_email,
           'mobile'=>$request->mobile,
           'join_date'=>$request->join_date,
           'job_timming'=>$request->job_timming,
           'subjects'=>$request->subjects,
           'password'=>bcrypt('123456'),
           'role'=>'tutor',
            'created_at' =>Carbon::now()
        ]);
    }
    public function addWeek(Request $request){

        $start_date = date('Y-m-d',strtotime($request->start_date)).' '.'18:30:00';
        $end_date = date('Y-m-d',strtotime($request->end_date)).' '.'18:29:59';
        $insert_data = [
          'start_date' => $start_date,
          'end_date' => $end_date,
          'week_name' => $request->week_name,
          'semester_id' => Session::get('semester_id'),
          'created_at' => Carbon::now(),
        ];

        Week::insert($insert_data);
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');

     }

     public function updateWeek(Request $request){
//        dd($request->all());

        $start_date = date('Y-m-d',strtotime($request->start_date)).' '.'18:30:00';
        $end_date = date('Y-m-d',strtotime($request->end_date)).' '.'18:29:59';
        $insert_data = [
            'semester_id' => Session::get('semester_id'),
          'start_date' => $start_date,
          'end_date' => $end_date,
          'week_name' => $request->week_name,
          'updated_at' => Carbon::now(),
        ];

        Week::where('id',$request->id)->update($insert_data);
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');

     }

     public function editWeek($id){
        $week = Week::find($id);
        $temp_data = $week->toArray();
         $temp_data['start_date'] = date('m-d-Y',strtotime($temp_data['start_date']));
         $temp_data['end_date'] = date('m-d-Y',strtotime($temp_data['end_date']));

         return Response::json($temp_data);

     }

//    public function contacts(){
//        $contacts = Contact::orderBy('created_at','desc')->get();
//        $page = 'contact';
////        dd($contacts);
//        return view('tutor.contact.showcontact', compact('page','contacts'));
//    }

    public function showWeekReport($id){

        $week = Week::find($id);
        $semester_id = Semester::find(Session::get('semester_id'));
        if($semester_id == null){
            return redirect('all-semesters')->with('returnStatus', true)->with('status', 101)->with('message', 'Please select semester');
        }
        $contactData= $semester_id->contacts()->orderBy('created_at','asc')->get();
        $weeks = $semester_id->weeks()->orderBy('created_at','asc')->get();
//       dd($contactData);
//       $data= DailyWorkReport::where('contact_id',$id)->get();
//       $courseData= Course::where('contact_id',$id)->get();
        //DailyWorkReport::all();
        //dd($id);

        return view('tutor.daily-work.weekly_student_details',compact('contactData','weeks','week'));

    }


    public function addNewContact(Request $request){
        $temp_data = $request->all();
        unset($temp_data['_token']);
        $temp_data['created_at'] = Carbon::now();
        $temp_data['semester_id'] = Session::get('semester_id');
        $insert = Contact::insert($temp_data);

        if($insert){
            return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
        }

    }

    public function deleteContact($id){
        $item = Contact::find($id);
        $item->delete();
        return redirect('daily-work-entry/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Work Report Added successfully');
    }

    public function paymentHistory(){
        $contactData= Contact::orderBy('created_at','asc')->get();
        $weeks = Week::orderBy('created_at','asc')->get();
        $student_daily_pays = StudentDailyPayHistory::orderBy('created_at','desc')->get();
        $course_pays = StudentCoursePayHistory::orderBy('created_at','desc')->get();

        return view('tutor.daily-work.paymenthistory',compact('contactData','weeks','student_daily_pays','course_pays'));
    }
}
