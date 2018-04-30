<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Support\Facades\Auth;

use App\User;
use App\Student;
use App\ClassPeriod;
use App\Teacher;
use App\TeacherSchedule;
use App\Course;

use Validator;
use Carbon;
use DB;

class StudentClassController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->student = Auth::user()->getStudent();

            return $next($request);
        });
        $current_time = Carbon\Carbon::now('Asia/Manila');
        $tokyo_time = Carbon\Carbon::now('Asia/Tokyo');
        $seoul_time = Carbon\Carbon::now('Asia/Seoul');
        $shanghai_time = Carbon\Carbon::now('Asia/Shanghai');
        $bangkok_time = Carbon\Carbon::now('Asia/Bangkok');
        $this->params = array(
            'msg' => '',
            'page' => '',
            'current_time' => $current_time,
            'tokyo_time' => $tokyo_time,
            'seoul_time' => $seoul_time,
            'shanghai_time' => $shanghai_time,
            'bangkok_time' => $bangkok_time
            
        );

    }

    public function classes_today()
    {
        $student = Student::find($this->student->id);
        $this->params['page'] = 'CLASSES_TODAY';
        $this->params['classes_today'] = $student->getClassesToday();

        $this->params['classes'] = $student->getClasses();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

        return view('student.classes')->with($this->params);
        // return $this->params;
    }

    public function classes_completed()
    {
        $student = Student::find($this->student->id);

        $this->params['page'] = 'COMPLETED_CLASSES';
        $this->params['classes_today'] = $student->getClassesToday();
        $this->params['classes'] = $student->getCompletedClasses();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

        return view('student.classes')->with($this->params);
    }

    public function upcoming_classes()
    {
        $student = Student::find($this->student->id);

        $this->params['page'] = 'UPCOMING_CLASSES';
        $this->params['classes_today'] = $student->getClassesToday();
        $this->params['classes'] = $student->getUpcomingClasses();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

        return view('student.classes')->with($this->params);
    }

    public function booked_classes()
    {
        $student = Student::find($this->student->id);

        $this->params['page'] = 'BOOKED_CLASSES';
        $this->params['classes_today'] = $student->getClassesToday();
        $this->params['classes'] = $student->getBookedClasses();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

        return view('student.classes')->with($this->params);
    }

    public function index()
    {
    	
    	$classes = ClassPeriod::where('student' , $this->student->id)->where('status' ,'<>', 'CANCELLED')->orderBy('start','ASC')->get();
        $student = Student::find($this->student->id);
        $this->params['classes'] = $classes;
        $this->params['classes_today'] = $student->getClassesToday();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

    	return view('student.classes')->with($this->params);
    }


    public function book()
    {
        $student = Student::find($this->student->id);

        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();


        // $teachers = Teacher::all();
        $teachers = DB::table('teachers')->join('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            ->orderBy('teachers_rank.rank', 'ASC')
            ->get();
        $this->params['teachers'] = $teachers;

        if (date('d') == 25) {
            return redirect()->back()->withErrors('Cannot book a class during 25th day of the month!');    
        }

        return view('student.booking')->with($this->params);   

    }


    public function bookByTime()
    {
        $student = Student::find($this->student->id);

        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        
        $teachers = Teacher::all();
        $this->params['teachers'] = $teachers;
        return view('student.bookbytime')->with($this->params);   
    }

    public function bookByDate($date)
    {
        $student = Student::find($this->student->id);

        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        
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

        return view('student.bookbydate')->with($this->params);   
    }

    public function bookByTeacher($id, Request $request)
    {
        $student = Student::find($this->student->id);
        
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        
        // if 25th day of month
        if (date('d') == 25) {
            return redirect()->back()->withErrors('Cannot book a class during 25th day of the month!');    
        }

        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            
            // $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +7 day'));
            $this->params['week'] = $week;
            $this->params['date'] = $date;
        }else{

            $date = Date("Y-m-d");
            $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +7 day'));
            $this->params['week'] = 0;
            $this->params['date'] = $date;      
        }

        $teacher =  Teacher::find($id);
        // $teachers = Teacher::all();
        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->where('status', 'OPEN')->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->where('status', 'BOOKED')->get();

        $this->params['classPeriods'] = $classPeriods;
        // $this->params['teachers'] = $teachers;
        $this->params['teacher'] = $teacher;
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
        
        $this->params['third_sat'] = $third_sat;
        // If date picked is 3rd saturday

        return view('student.bookbyteacher-v2')->with($this->params);   
    }

    public function getAvailableTeacher(Request $request){
        $student = Student::find($this->student->id);
        
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        

        $start = Date("Y-m-d H:i:s", strtotime($request->get('start')));
        $end = Date("Y-m-d H:i:s", strtotime($request->get('end')));

        // return response()->json(array( 'start' => $start, 'end' => $end ));
        $teachers_scheds = TeacherSchedule::where( 'start', '<=', $start )->where( 'end', '>=', $end )->get();
        if (count($teachers_scheds) > 0) {
            foreach ($teachers_scheds as $sched) {
                $teacher = Teacher::find($sched->teacher_id);
                $sched->teacher = $teacher;
            }
        }
        // $teachers_scheds = array();
        // $available_teachers = Teacher::getAvailableTeacher($start, $end);
        return response()->json(array( 'start' => $start, 'end'=> $end, 'sched' => $teachers_scheds));

    }

    public function store(Request $request)
    {
        $student = Student::find($this->student->id);
        
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        

        // dd($request->all());
         // Define Class fields rules
        $rules = array(

            // user 
            'tutor_id'                      => 'required|min:1',
            'schedule-date'                 => 'required|min:1',
            'from-time'                     => 'required|min:1',
            'to-time'                       => 'required|min:1',
      
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            
            return redirect('student/classes')
                    ->withErrors($validator)
                    ->withInput();
        }

        $start = date("Y-m-d H:i", strtotime($request->get('schedule-date')." ". $request->get('from-time')));
        $end = date("Y-m-d H:i", strtotime($request->get('schedule-date')." ". $request->get('to-time')));

        if( date(strtotime($start)) < date(strtotime($this->params['current_time']. "+30 minutes"))){
            return redirect()->back()
                    ->withErrors(['Cannot book a class! You must book 30 minutes earlier.']);
        }

        // get conflict with same schedule with same teacher
        $conflict_class = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('teacher', $request->get('tutor_id'))->where('status', '<>', 'CANCELLED')->first();
        if($conflict_class){
            return redirect()->back()
                    ->withErrors(['Sorry! The seleted class schedule is already booked!']);
        }

        // get conflict if current student book same schedule
        $conflict_class_2 = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('student', $this->student->id)->where('status', '<>', 'CANCELLED')->first();
        
        if($conflict_class_2){
            return redirect()->back()
                    ->withErrors(['Sorry! The seleted class schedule is already booked with teacher '.$conflict_class_2->getTeacher['firstname'].'.']);
        }


        if($student->available_class < 1) {
            return redirect()->back()
                    ->withErrors(["Sorry! You don't have available class to booked!"]);
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
                    ->withErrors(["You already reach 20 classes! Wait for your teacher to finish your progress report before booking another class."]);

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
        $classPeriod->student = $this->student->id;
        $classPeriod->author = $this->user->id;
        $classPeriod->teacher = $request->get('tutor_id');
        $classPeriod->course = $course->id;
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        $classPeriod->type = "REGULAR";
        $classPeriod->save();


        // Decrement available class by 1
        $student->available_class = (intval($student->available_class) - 1);
        $student->save();

        return redirect()->back()->withSuccess('You have successfully booked a class!');

    }

    public function destroy($id, Request $request){

        $class = ClassPeriod::find($id); 
        
        if( date(strtotime($class->start)) < date(strtotime($this->params['current_time']. "+2 hours"))){
            return redirect()->back()
                    ->withErrors(['Cannot cancel a class 2 hours before the schedule time!']);
        }

        $class->status = "CANCELLED";
        $class->save();

        return redirect()->back()->withSuccess("Class successfully cancelled!");

    }

    public function class_evaluation($id){

        $class = ClassPeriod::find($id);
        $class->evaluation = json_decode($class->evaluation);
        $this->params['class'] = $class;
        return response()->json($class);
        // return view('teacher.classperiod')->with($this->params);
    }
    public function class_evaluation_print($id){

        $class = ClassPeriod::find($id);
        $class->evaluation = json_decode($class->evaluation);
        $this->params['class'] = $class;

        return view('student.evaluation-print')->with($this->params);
    }
}
