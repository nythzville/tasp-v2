<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


use App\User;
use App\Student;
use App\Course;
use App\Agent;
use App\Teacher;
use App\TeacherSchedule;
use App\ClassPeriod;

use Validator;
use Carbon;
use Auth;

class AdminStudentController extends Controller
{
    //
    public function __construct()
    {
        $current_time = Carbon\Carbon::now('Asia/Manila');
        // $user = Auth::user();
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->student = Auth::user()->getStudent();

            return $next($request);
        });
        $this->params = array(
            'msg' => '',
            'error' => false,
            // 'user' => $user,
            'current_time' => $current_time,

        );
    }

    public function index()
    {

    	$students = Student::all();
    	$this->params['students'] = $students;

    	return view('admin.student.list')->with($this->params);
    }

    public function create()
    {
        $courses = Course::all();
        $this->params['courses'] = $courses;
        $this->params['student'] = new Student;

        $this->params['action'] = 'create';

    	return view('admin.student.form')->with($this->params);
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
            'student_id'                => 'required|min:1',
            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'gender'              		=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect('admin/student/create')
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
        $student->agent_id              = 1;

        $student->lastname              = $request->get('lastname');
        $student->firstname             = $request->get('firstname');
        $student->skype                 = $request->get('skype-id');
        $student->qq                    = $request->get('qq-id');
        $student->gender                = $request->get('gender');
        $student->dob                   = $request->get('dob');
        $student->available_class       = 0;

	    $student->save();
        
        
        // return redirect('admin/student/'.$student->id.'/trial_class')->with($this->params);
        return redirect('admin/student/'.$student->id)->with($this->params);


    }
    public function edit($id)
    {
    	$student = Student::find($id);
        $courses = Course::all();

    	$this->params['student'] = $student;
        $this->params['courses'] = $courses;

    	$this->params['action'] = 'edit';

    	return view('admin.student.form')->with($this->params);
    }
    public function update($id, Request $request)
    {
    	// Define Student fields rules
        $rules = array(
            'student_id'                => 'required|min:1',
            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'gender'              		=> 'required|min:1',      

            // 'sched-date'              	=> 'required|min:1',            
            // 'sched-time'              	=> 'required|min:1',            
            );

        $student = Student::find($id);

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect('admin/agent/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        // continue if no error occur
        $student->lastname              = $request->get('lastname');
    	$student->lastname				= $request->get('lastname');
    	$student->firstname				= $request->get('firstname');
    	$student->skype					= $request->get('skype-id');
        $student->dob                   = date("Y-m-d", strtotime($request->get('dob')));
    	$student->qq					= $request->get('qq-id');
        $student->trial_class 			= $request->get('sched-date') . ' ' . $request->get('sched-time');

	    $student->save();
        return redirect('admin/student')->with($this->params);
        // return redirect('admin/student/'.$student->id.'/trial_class')->with($this->params);


    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        
        return redirect('admin/student')->withSuccess('Student Successfully Deleted!');
    }

    public function show($id)
    {
        $student = Student::find($id);
        $this->params['student'] = $student;
        // get all today

        $classes = ClassPeriod::where('student' , $id)
        ->where('status' , '<>', 'CANCELED')
        ->orderBy('start','DESC')
        ->get();

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('status' , 'COMPLETED')
        ->get();
        $this->params['completed_classes'] = $completed_classes;
        $this->params['classes'] = $classes;

        $this->params['teachers'] = Teacher::all();

        return view('admin.student.profile')->with($this->params);
    }

    // UPload Profile Picture
    public function crop_image($id, Request $request){
        $student  = Student::find($id);
        $user = User::find($student->user->id);

        // return response()->json(array('user' => $user));
        try {
            // Get uploaded file
            $file = $request->file('avatar_file');
            // Generate name
            $image_name = time().".".$file->getClientOriginalExtension();
            // Get Extension
            $extension = $file->getClientOriginalExtension();
            
            // Move to uploads
            if($file->move('uploads', $image_name)){
                
                if( !empty($user->user_image )){
                    if(file_exists( sprintf('uploads/%s', $user->user_image ))){
                        unlink(sprintf('uploads/%s', $user->user_image ));
                    }
                }
            }
            
            // Get Mimetype
            $mimetype = $file->getClientMimeType();
            $arr_mime = explode("/", $mimetype);
            
            $thumbnail_path = "video-thumbnail.png";
            
            $avatar_data = json_decode($request->get('avatar_data'));
                
            $thumbnail_path = "thumbnail-".$image_name;
            // $image = Image::make(sprintf('uploads/%s', $image_name));
            // $image->crop( intval($avatar_data->width), intval($avatar_data->height), intval($avatar_data->x) , intval($avatar_data->y) );
            // $image->save(sprintf('uploads/%s', $image_name));
            
           
            $path = url('uploads/' . $image_name);

            $user->user_image = 'uploads/' . $image_name;
            $user->save();

                           
        } catch (Exception $e) {

            return response()->json(array(
                'error'=> true,
                'msg'=> $e->getMessage(),
                ));
        }

        return response()->json(array( 'state' => 200, 'result' => $path, 'message' => 'Profile Image Successfully updated!'));
    }

    public function booking($id)
    {
        $student = Student::find($id);
        $this->params['student'] = $student;
        $this->params['booking_calendar'] = true;

        return view('admin.student.booking')->with($this->params);
    }

    public function get_classes($id){

        $student = Student::find($id);
        $classes =  ClassPeriod::where('student_id', $id)->get();

        $this->params['student'] = $student;
        $this->params['classes'] = $classes;

        return response()->json($this->params);
    }

    public function get_available_tutor(){
        $classes = ClassPeriod::where('start', '>=', $from)->where('end', '<=', $to)->get();
     
        $teachers = Teacher::all();

        // if has on selected schedule
        if(count($classes) > 0){

            foreach ($classes as $class) {
                $teacher_id = $class->teacher_id;

            }
        }   
        $this->params['teachers'] = $teachers;
        return response()->json($this->params);    
    }

    public function student_trial_class_teacher($id){

        $this->params['student'] = Student::find($id);
        $this->params['teachers'] = Teacher::all();

        return view('admin.student.trial-class-teachers')->with($this->params);
    }

    public function trial_class(Request $request, $student_id, $teacher_id)
    {

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

        return view('admin.student.trial-class')->with($this->params);
    }

    public function book_trial_class(Request $request, $student_id, $teacher_id)
    {

        $student = Student::find($student_id);
        if(!$student){
            return redirect('admin/student')->with($this->params);
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
        
        return redirect('admin/student/'.$student->id)->with($this->params);

    }

    public function get_teacher_sched($id, Request $request){

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
            return redirect('admin/student/'.$id.'/profile')->with($this->params);


        }

        $available_class = $request->get('available_class');

        $student->available_class = $available_class;
        $student->save();

        $this->params['msg'] = 'Available Classes Updated!';
        return redirect('admin/student/'.$id)->with($this->params);

    }


    // Book Regular Class
    public function book($id){

        $this->params['student'] = Student::find($id);
        $this->params['teachers'] = Teacher::all();

        return view('admin.student.student-booking')->with($this->params);
    }

    public function book_by_teacher(Request $request, $student_id, $teacher_id)
    {

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

        return view('admin.student.regular-class')->with($this->params);
    }


     // Book A Class
    public function book_regular_class(Request $request, $student_id, $teacher_id)
    {

        $student = Student::find($student_id);
        if(!$student){
            return redirect('admin/student')->with($this->params);
        }
        $rules = array(

            // user 
            'tutor_id'                      => 'required|min:1',
            'schedule-date'                 => 'required|min:1',
            'from-time'                     => 'required|min:1',
            'to-time'                       => 'required|min:1',
            'type'                          => 'required|min:1',
            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return redirect('admin/student/'.$student->id)->with($this->params);
            
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
            return redirect('admin/student/'.$student->id)
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

        $course = $student->getCourse($request->get('tutor_id'));
        if (!$course) {
            $course = new Course;
            $course->student_id  = $student->id;
            $course->teacher_id  = $request->get('tutor_id');
            $course->name = 'EA English Course';
            $course->status = 'Active';
            $course->save();
        }

        $classPeriod = new ClassPeriod;
        $classPeriod->author = $this->user->id;
        $classPeriod->student = $student->id;
        $classPeriod->teacher = $teacher_id;
        $classPeriod->course = $course->id;
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        // $classPeriod->type = "REGULAR";
        $classPeriod->type = $request->get('type');

        
        $classPeriod->save();
        if ($request->get('type') == 'TRIAL') {
           $course->trial_class_id = $classPeriod->id;
           $course->save();
        }
        

        return redirect()->back()->withSuccess('Successfully booked a Class.');

        // return redirect('admin/student/'.$student->id)->with($this->params);
    }
}