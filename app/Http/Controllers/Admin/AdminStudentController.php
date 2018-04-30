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
use DB;

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
        return redirect('admin/students/'.$student->id)->withSuccess("Student successfully added!");


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
            'password'                  => 'required|min:6|confirmed',          
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
    	$student->lastname				= $request->get('lastname');
    	$student->firstname				= $request->get('firstname');
    	$student->skype					= $request->get('skype-id');
        $student->dob                   = date("Y-m-d", strtotime($request->get('dob')));
    	$student->qq					= $request->get('qq-id');
	    $student->save();

        // update user password
        $user = User::find($student->user_id);
        $user->password             = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->withSuccess("Student information successfully updated!");
        // return redirect('admin/student/'.$student->id.'/trial_class')->with($this->params);


    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $user = User::find($student->user_id);

        $student->delete();
        $user->delete();
        
        DB::table('classes')
         ->where('student', $id)
         ->delete();
         
        DB::table('courses')
         ->where('student_id', $id)
         ->delete();

        return redirect('admin/students')->withSuccess('Student Successfully Deleted!');
    }

    public function show($id)
    {
        $student = Student::find($id);
        $this->params['student'] = $student;
        // get all today

        $classes = ClassPeriod::where('student' , $id)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','DESC')->limit(20)
        ->get();

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('status' , 'COMPLETED')->limit(20)
        ->get();

        $courses_with_pr = Course::where('student_id',$id)
        ->where('regular_classes_completed','>=', 20)
        ->where('report','!=', NULL)
        ->get();
        $this->params['courses_with_pr'] = $courses_with_pr;

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


    /*
    * Progress Report
    *
    */
    public function progress_report($id, $course_id, Request $request){
        
        
        $student = Student::find($id);
        $course = Course::find($course_id);
        $teacher = $course->getTeacher();

        if ((!$student)||(!$course)) {
            return redirect()->back()->withErrors('Invalid!');
            
        }
        $progress_report = $request->all();
        $progress_report['teacher'] =  $teacher->id;
        unset($progress_report['_token']);
        $course->report = json_encode($progress_report);
        
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        if($course->save()){
            return redirect()->back()->withSuccess('Progress Report Successfully Saved!');
        }else{
            return redirect()->back()->withErrors('Unable to save Progress Report!');
        }

    }

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
        $this->params['user'] = $user;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['course'] = $course;
        $this->params['page'] = "PROGRESS_REPORT";


        // dd($this->params);
        return view('admin.student.progress-report')->with($this->params);

    }


    public function booking($id)
    {
        $student = Student::find($id);
        $this->params['student'] = $student;
        $this->params['booking_calendar'] = true;

        return view('admin.student.booking')->with($this->params);
    }


    /* Select date for booking by date */
    public function select_booking_date($id)
    {
        $student = Student::find($id);
        $this->params['student'] = $student;
        $this->params['booking_calendar'] = true;

        return view('admin.student.select-booking-date')->with($this->params);   
    }

    /* Book by date */
    public function book_by_date($id, $date)
    {
        $student = Student::find($id);
        
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
        // if ( date($date) == date($third_sat)) {
        //     return redirect()->back()->withErrors('Cannot book on the third saturday of the month!');
        // }

        return view('admin.student.book-by-date')->with($this->params);   

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
            return redirect('admin/students')->with($this->params);
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
        
        return redirect('admin/students/'.$student->id)->with($this->params);

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
        return redirect()->back()->withSuccess('Available Classes Updated!');

    }


    // Book Regular Class
    public function book($id, Request $request){

        $this->params['student'] = Student::find($id);
        $search_key = $request->get('s');
        if($search_key!=null){
            $teachers = Teacher::where('lastname' , 'LIKE', '%'.$search_key.'%')
            ->orWhere('firstname' , 'LIKE', '%'.$search_key.'%')
            ->orWhere('teacher_id' , 'LIKE', '%'.$search_key.'%')
            ->get();
        }else{

            // $teachers = Teacher::leftJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
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

        $this->params['teachers'] = $teachers;
        $this->params['search_key'] = $search_key;


        return view('admin.student.student-booking')->with($this->params);
    }

    public function book_by_teacher(Request $request, $student_id, $teacher_id)
    {

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
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', date("Y-m-d", strtotime($until."+1 day")))->where('teacher_id', $teacher->id)->where('status', 'OPEN')->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', date("Y-m-d", strtotime($until."+1 day")) )->where('teacher', $teacher->id)->where('status', 'BOOKED')->get();

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
            return redirect('admin/students')->with($this->params);
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
            return redirect()->back()->withErrors($this->params['msg']);
            
        }

        $start = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('from-time')));
        $end = date("Y-m-d H:i:s", strtotime($request->get('schedule-date')." ". $request->get('to-time')));

        if( date(strtotime($start)) < date(strtotime($this->params['current_time']))){
            return redirect()->back()
                    ->withErrors(['Cannot book a class! Class must be book before the current time.']);
        }

        // 
        $conflict_class = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('teacher', $request->get('tutor_id'))->where('status', '<>', 'CANCELLED')->first();
        if($conflict_class){
            return redirect()->back()
                    ->withErrors(['Sorry! The selected class schedule is already booked!']);
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

        // If class already reach 20 then add another

        if ($course->regular_classes_completed >= 20) {
            if (empty($course->report)) {
                return redirect()->back()
                    ->withErrors(["Student already reach 20 classes! Wait for the teacher to finish your progress report before booking another class."]);

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
        // $classPeriod->type = "REGULAR";
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

        // return redirect('admin/student/'.$student->id)->with($this->params);
    }
}