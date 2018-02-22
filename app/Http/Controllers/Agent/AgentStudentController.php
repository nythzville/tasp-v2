<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Teacher;
use App\Agent;
use App\Course;
use App\User;
use App\TeacherSchedule;
use App\ClassPeriod;

use Auth;
use Validator;
use Carbon;
class AgentStudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->agent = Auth::user()->getAgent();

            return $next($request);
        });

        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'page' => '',
            'current_time' => $current_time,

        );
    }

    public function index()
    {
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;
    	$students = Student::where('agent_id', $this->agent->id)->get();
    	$this->params['students'] = $students;
    	return view('agent.student-list')->with($this->params);

    }
    public function show($id)
    {
        $agent = Agent::find($this->agent->id);
        $student = Student::find($id);

        if (!$student) {
            $this->params['msg'] = 'Student Not Available!';
            return redirect('agent/student')->with($this->params);
        }

        if ($student->agent_id != $this->agent->id) {
            $this->params['msg'] = 'Cannot Access Specific Student!';
            return redirect('agent/student')->with($this->params);
        }

        $this->params['student'] = $student;
        // get all today

        $classes = ClassPeriod::where('student' , $id)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','ASC')
        ->get();

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('status' , 'COMPLETED')
        ->orderBy('start','ASC')
        ->get();
        $this->params['completed_classes'] = $completed_classes;
        $this->params['classes'] = $classes;

        $this->params['teachers'] = Teacher::all();

        return view('agent.student-profile')->with($this->params);
    }
    public function create()
    {
        $courses = Course::all();
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;
        $this->params['courses'] = $courses;
        $this->params['teachers'] = Teacher::all();
        $this->params['student'] = new Student;

        $this->params['action'] = 'create';

    	return view('agent.student-form')->with($this->params);
    }
    public function store(Request $request)
    {	
		// Define Student fields rules
        $rules = array(

            // user 
            'username'                  => 'required|min:6',
            'email'                     => 'required|unique:users|max:255',
            'password'                  => 'required|min:6|confirmed',


            // student
            'student_id'          	    => 'required|min:1',
            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'gender'              		=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $new_user = new User();
        $new_user->name                 = $request->get('username');
        $new_user->email                = $request->get('email');
        $new_user->password             = bcrypt($request->get('password'));
        $new_user->user_type            = "STUDENT";

        $new_user->save();

        // continue if no error occur
    	$student = new Student();
        $student->user_id               = $new_user->id;
        $student->student_id            = $request->get('student_id');
        $student->agent_id              = $this->agent->id;


    	$student->lastname				= $request->get('lastname');
    	$student->firstname				= $request->get('firstname');
    	$student->skype					= $request->get('skype-id');
    	$student->qq					= $request->get('qq-id');
        $student->gender                = $request->get('gender');
        $student->dob                   = $request->get('dob');
        // $student->available_class       = 20;
        $student->available_class       = 0;


	    $student->save();
        
        $course = new Course();
        $course->student_id             = $student->id;
        $course->name                   = 'english_course';
        $course->description            = 'English Course';
        $course->status                 = 'Active';
        $course->save();

        // return redirect('agent/student/'.$student->id.'/trial_class')->with($this->params);
        return redirect('agent/student/'.$student->id)->withSuccess('Successfully Added Student!');
    }

    public function student_trial_class_teacher($id){

        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $this->params['student'] = Student::find($id);
        $this->params['teachers'] = Teacher::all();

        return view('agent.trial-class-teachers')->with($this->params);
    }

    public function trial_class(Request $request, $student_id, $teacher_id)
    {
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            
            // $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = $week;
            $this->params['date'] = $date;
        }else{

            $date = Date("Y-m-d");
            $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = 0;
            $this->params['date'] = $date;      
        }

        $student = Student::find($student_id);
        $teacher =  Teacher::find($teacher_id);
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->get();

        $this->params['classPeriods'] = $classPeriods;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['teacher_scheds'] = $teacher_scheds;

        return view('agent.trial-class')->with($this->params);
    }


    // Book A Trial Class
    public function book_trial_class(Request $request, $student_id, $teacher_id)
    {
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $student = Student::find($student_id);
        if(!$student){
            return redirect('agent/student')->with($this->params);
        }
        $rules = array(

            // user 
            'tutor_id'                      => 'required|min:1',
            'schedule-date'                 => 'required|min:1',
            'from-time'                     => 'required|min:1',
            'to-time'                     => 'required|min:1',
      
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            // return view('admin.student.form', $this->params);
        }

        $start = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('from-time')));
        $end = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('to-time')));


        $classPeriod = new ClassPeriod;
        $classPeriod->author = $this->params['user']->id;
        $classPeriod->student = $student->id;        
        $classPeriod->teacher = $request->get('tutor_id');
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        $classPeriod->type = "TRIAL";

        $classPeriod->save();

        $student->trial_class = $classPeriod->id;
        $student->save();

        return redirect('agent/student/'.$student->id)->with($this->params);
    }

    public function get_teacher_sched($id, Request $request){
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            
            // $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = $week;
            $this->params['date'] = $date;
        }else{

            $date = Date("Y-m-d");
            $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = 0;
            $this->params['date'] = $date;      
        }

        $teacher =  Teacher::find($id);
        // $teachers = Teacher::all();
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->get();

        $this->params['classPeriods'] = $classPeriods;
        // $this->params['teachers'] = $teachers;
        $this->params['teacher'] = $teacher;
        $this->params['teacher_scheds'] = $teacher_scheds;

        return response()->json($this->params);
    }

    
    /*


    */
    // Book Regular Class
    public function book($id){
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $this->params['student'] = Student::find($id);
        $this->params['teachers'] = Teacher::all();

        return view('agent.student-booking')->with($this->params);
    }

    public function book_by_teacher(Request $request, $student_id, $teacher_id)
    {
        $agent = Agent::find($this->agent->id);


        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            
            // $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = $week;
            $this->params['date'] = $date;
        }else{

            $date = Date("Y-m-d");
            $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +6 day'));
            $this->params['week'] = 0;
            $this->params['date'] = $date;      
        }

        $student = Student::find($student_id);
        $teacher =  Teacher::find($teacher_id);
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->get();

        $this->params['classPeriods'] = $classPeriods;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['teacher_scheds'] = $teacher_scheds;

        return view('agent.regular-class')->with($this->params);
    }


     // Book A Class
    public function book_regular_class(Request $request, $student_id, $teacher_id)
    {
        $agent = Agent::find($this->agent->id);
        $student = Student::find($student_id);
        if(!$student){
            return redirect('agent/student')->with($this->params);
        }
        $rules = array(

            // user 
            'tutor_id'                      => 'required|min:1',
            'schedule-date'                 => 'required|min:1',
            'from-time'                     => 'required|min:1',
            'to-time'                     => 'required|min:1',
      
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return redirect('agent/student/'.$student->id)->with($this->params);
            
        }

        $start = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('from-time')));
        $end = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('to-time')));

        if( date(strtotime($start)) < date(strtotime($this->params['current_time']. "+2 hours"))){
            return redirect()->back()
                    ->withErrors(['Cannot book a class! Schedule must be 2 hours earlier than current time.']);
        }

        $conflict_class = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('teacher', $request->get('tutor_id'))->first();
        if($conflict_class){
            return redirect()->back()
                    ->withErrors(['Sorry! The seleted class schedule is already booked!']);
        }
        
       // if class type is TRIAL 
        if($request->get('type') == "TRIAL"){
            // Limit Trial Class 1 per teacher
            $has_trial_class = ClassPeriod::where('student', $student->id)->where('teacher', $teacher_id)->where('type', 'TRIAL')->count();
            if ($has_trial_class >= 1) {
                return redirect()->back()
                        ->withErrors(['Sorry! Student named '.$student->firstname.' has already booked a trial class with the same teacher more than once.']);   
            }

            // Limit Trial class into 3
            $trial_classes_count = ClassPeriod::where('student', $student->id)->where('type', 'TRIAL')->count(); 
            if(($request->get('type') == "TRIAL") && ($trial_classes_count >= 3 )){
                return redirect()->back()
                        ->withErrors(['Sorry! Student named '.$student->firstname.' has already reach the maximum limit for trial class.']);
            }
        }

        // Check Avilable class
        if( intval($student->available_class) < 1 ){
            return redirect()->back()
                    ->withErrors(['Sorry! Student has no available class left to book.']);
        }

        $classPeriod = new ClassPeriod;
        $classPeriod->author = $this->user->id;
        $classPeriod->student = $student->id;
        $classPeriod->teacher = $teacher_id;
        $classPeriod->course = $student->getCourse()->id;
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        // $classPeriod->type = "REGULAR";
        $classPeriod->type = $request->get('type');


        $classPeriod->save();

        return redirect()->back()->withSuccess('Successfully booked a Class.');

        // return redirect('agent/student/'.$student->id)->with($this->params);
    }
}
