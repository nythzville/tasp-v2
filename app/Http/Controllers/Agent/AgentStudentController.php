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
use DB;

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
        ->orderBy('start','DESC')
        ->limit(20)
        ->get();

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('status' , 'COMPLETED')
        ->orderBy('start','DESC')
        ->limit(20)
        ->get();

        $courses_with_pr = Course::where('student_id',$id)
        ->where('regular_classes_completed','>=', 20)
        ->where('report','!=', NULL)
        ->get();

        $this->params['courses_with_pr'] = $courses_with_pr;
        $this->params['completed_classes'] = $completed_classes;
        $this->params['classes'] = $classes;
        $this->params['agent'] = $agent;
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
        $student->available_class       = 0;
	    $student->save();
        

        // return redirect('agent/student/'.$student->id.'/trial_class')->with($this->params);
        return redirect('agent/students/'.$student->id)->withSuccess('Successfully Added Student!');
    }


    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::all();
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $this->params['student'] = $student;
        $this->params['courses'] = $courses;

        $this->params['action'] = 'edit';

        return view('agent.student-form')->with($this->params);
    }
    public function update($id, Request $request)
    {
        // Define Student fields rules
        $rules = array(
            'student_id'                => 'required|min:1',
            'lastname'                  => 'required|min:1',
            'firstname'                 => 'required|min:1',
            // 'password'                  => 'required|min:6|confirmed',          
            );

        $student = Student::find($id);

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // continue if no error occur
        $student->student_id            = $request->get('student_id');
        $student->lastname              = $request->get('lastname');
        $student->firstname             = $request->get('firstname');
        $student->skype                 = $request->get('skype-id');
        $student->dob                   = date("Y-m-d", strtotime($request->get('dob')));
        $student->qq                    = $request->get('qq-id');
        $student->save();

        $user = User::find($student->user_id);
        // update user password
        if (($request->get('password') != null) && ($request->get('password') != "")) {   
            $user->password             = bcrypt($request->get('password'));
            
        }
        $user->name                 = $request->get('username');
        $user->email             = $request->get('email');

        $user->save();

        return redirect()->back()->withSuccess("Student information successfully updated!");

    }

    public function update_available_class($id, Request $request){

        $student = Student::find($id);
        $rules = array(
            // available_class 
            'available_class'                      => 'required|min:1',
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return redirect()->back()->withErrors($this->params['msg']);


        }

        $available_class = $request->get('available_class');

        $student->available_class = $available_class;
        $student->save();

        return redirect()->back()->withSuccess('Available Classes Updated!');

    }

    /*
    * Progress Report
    *
    */
   

    public function progress_report_get($id, $course_id){
        $user = Auth::user();
        $student = Student::find($id);
        $course = Course::find($course_id);
        $teacher = $course->getTeacher();

        $this->params['user'] = $this->user;

        if (!$course) {
            return redirect('teacher/student/'.$student->id)->withErrors('Progress Report not found!');
        }
        $progress_report = $course->report;
        if ($progress_report) {
            $student->progress_report = json_decode($progress_report); 
            
        }
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;
        $this->params['user'] = $user;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['course'] = $course;
        $this->params['page'] = "PROGRESS_REPORT";


        // dd($this->params);
        return view('agent.student-progress-report')->with($this->params);

    }

    /* Select date for booking by date */
    public function select_booking_date($id)
    {
        $student = Student::find($id);
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;
        $this->params['student'] = $student;
        $this->params['booking_calendar'] = true;

        return view('agent.student-select-booking-date')->with($this->params);   
    }

    /* Book by date */
    public function book_by_date($id, $date)
    {
        $student = Student::find($id);
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $this->params['student'] = $student;

        $date = Date("Y-m-d", strtotime( $date ));
        $until = Date("Y-m-d", strtotime( $date . ' +1 day'));
        $this->params['date'] = $date;

        $teachers = Teacher::all();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->orderBy('teacher', 'desc')->where('status', 'BOOKED')->orderBy('start', 'ASC')->get();

        $this->params['classPeriods'] = $classPeriods;
        $this->params['teachers'] = $teachers;

        // Get 3rd saturday of the month
        $current_month = date("m", strtotime($date));        
        $current_year = date("Y", strtotime($date));        
        // $days_count = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
        $days_count = date('t', strtotime($date));
        $month_start = Date("Y-m-d", mktime(0,0,0, $current_month, 1, $current_year ) );
      
        $count = 0;
        $third_sat = 0;
        for ($i=1; $i < $days_count; $i++) { 
            if(date('l', strtotime($month_start. "+".$i." day")) == 'Saturday'){
                $count++;
            }
            if ($count == 3) {
                $third_sat = date('Y-m-d', strtotime($month_start. "+".$i." day"));
                break;
            }
        }
        // If date picked is 3rd saturday
        if ( date($date) == date($third_sat)) {
            return redirect()->back()->withErrors('Cannot book on the third saturday of the month!');
        }

        return view('agent.student-book-by-date')->with($this->params);   

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
    public function book($id, Request $request){
        $agent = Agent::find($this->agent->id);
        $this->params['agent'] = $agent;

        $search_key = $request->get('s');
        if($search_key!=null){
            $teachers = Teacher::where('lastname' , 'LIKE', '%'.$search_key.'%')
            ->orWhere('firstname' , 'LIKE', '%'.$search_key.'%')
            ->orWhere('teacher_id' , 'LIKE', '%'.$search_key.'%')
            ->get();
        }else{

            // $teachers = Teacher::rightJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            //     ->join('users', 'users.id', '=', 'teachers.user_id')
            //     ->orderBy('teachers_rank.rank', 'ASC')
            //     ->get();
            $teachers = Teacher::all();

        }
        $teachers = $teachers->map(function ($item, $key) {
            $item->rank = $item->rank;
            return $item;
        });
        $teachers = $teachers->sortBy('rank');

        
        $this->params['student'] = Student::find($id);
        $this->params['teachers'] = $teachers;
        $this->params['search_key'] = $search_key;

        // dd($teachers);
        return view('agent.student-booking')->with($this->params);
    }


    /* Booking by Teacher */
    public function book_by_teacher(Request $request, $student_id, $teacher_id)
    {
        $agent = Agent::find($this->agent->id);


        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            // $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            // $date = Date("Y-m-d", strtotime( $date ));
            // $until = Date("Y-m-d", strtotime( $date . ' +7 day'));
            $this->params['week'] = $week;
            $this->params['date'] = $date;
            $date = $this->params['date_start'] = date('Y-m-d', strtotime('sunday last week +'.$mul.' days'));
            $until = $this->params['date_end'] = date('Y-m-d', strtotime('saturday this week +'.$mul.' days'));
        }else{

            $date = Date("Y-m-d");
            // $date = Date("Y-m-d", strtotime( $date ));
            // $until = Date("Y-m-d", strtotime( $date . ' +7 day'));
            $this->params['week'] = 0;
            $this->params['date'] = $date;
            $date = $this->params['date_start'] = date('Y-m-d', strtotime('sunday last week'));
            $until = $this->params['date_end'] = date('Y-m-d', strtotime('saturday this week'));

        }

        $student = Student::find($student_id);
        $teacher =  Teacher::find($teacher_id);
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->where('status', 'OPEN')->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->where('status', 'BOOKED')->get();

        $this->params['classPeriods'] = $classPeriods;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['agent'] = $agent;
        $this->params['teacher_scheds'] = $teacher_scheds;


        // Get 3rd saturday of the month
        $current_month = date("m", strtotime($date));        
        $current_year = date("Y", strtotime($date));        
        // $days_count = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
        $days_count = date('t', strtotime($date));
        $month_start = Date("Y-m-d", mktime(0,0,0, $current_month, 1, $current_year ) );
      
        $count = 0;
        $third_sat = 0;
        for ($i=1; $i < $days_count; $i++) { 
            if(date('l', strtotime($month_start. "+".$i." day")) == 'Saturday'){
                $count++;
            }
            if ($count == 3) {
                $third_sat = date('Y-m-d', strtotime($month_start. "+".$i." day"));
                break;
            }
        }
        $this->params['current_month_ends'] = date("Y-m-d", strtotime($current_year."-".$current_month."-".$days_count));
        $this->params['third_sat'] = $third_sat;
        // If date picked is 3rd saturday


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

        // if 25th day of month
        if (date('d') == 25) {
            return redirect()->back()->withErrors('Cannot book a class during 25th day of the month!');    
        }

        $start = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('from-time')));
        $end = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('to-time')));

        // if( date(strtotime($start)) < date(strtotime($this->params['current_time']. "+2 hours"))){
        if( date(strtotime($start)) < date(strtotime($this->params['current_time']))){

            return redirect()->back()
                    ->withErrors(['Cannot book a class! Class must be book before the current time.']);
        }

        $conflict_class = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('teacher', $request->get('tutor_id'))->where('status', '<>', 'CANCELLED')->first();
        if($conflict_class){
            return redirect()->back()
                    ->withErrors(['Sorry! The seleted class schedule is already booked!']);
        }
        
        // get conflict if current student book same schedule
        $conflict_class_2 = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('student', $student->id)->where('status', '<>', 'CANCELLED')->first();
        
        if($conflict_class_2){
            return redirect()->back()
                    ->withErrors(['Sorry! The selected schedule for student with id [ '.$conflict_class_2->getStudent['student_id'].' ] was already booked with Teacher '.$conflict_class_2->getTeacher['firstname'].'.']);
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
        // if( intval($student->available_class) < 1 ){
        //     return redirect()->back()
        //             ->withErrors(['Sorry! Student has no available class left to book.']);
        // }

        $course = $student->getCourse($request->get('tutor_id'));
        if (!$course) {
            $course = new Course;
            $course->student_id  = $student->id;
            $course->teacher_id  = $request->get('tutor_id');
            $course->name = 'EA English Course';
            $course->status = 'Active';
            $course->save();
        }

        // If class already reach 20 then add another

        if ($course->regular_classes_completed >= 20) {
            if (empty($course->report)) {
                return redirect()->back()
                    ->withErrors(["The student already reach 20 classes! Wait for the teacher to finish your progress report before booking another class."]);

            }else{
                $course->status = 'Closed';
                $course->save();

                $course = new Course;
                $course->student_id  = $student->id;
                $course->teacher_id  = $request->get('tutor_id');
                $course->name = 'EA English Course';
                $course->status = 'Active';
                $course->save();
            }
        }

        $classPeriod = new ClassPeriod;
        $classPeriod->author = $this->user->id;
        $classPeriod->student = $student->id;
        $classPeriod->teacher = $teacher_id;
        $classPeriod->course = $course->id;
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        $classPeriod->type = $request->get('type');

        $classPeriod->save();

        if ($request->get('type') == 'TRIAL') {
           $course->trial_class_id = $classPeriod->id;
           $course->save();
        }

        // Decrement available class by 1
        $student->available_class = (intval($student->available_class) - 1);
        $student->save();
        
        return redirect()->back()->withSuccess('Successfully booked a Class.');

        // return redirect('agent/student/'.$student->id)->with($this->params);
    }
}
