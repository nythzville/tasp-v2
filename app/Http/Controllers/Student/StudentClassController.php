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
        // $classes = ClassPeriod::where('student' , $this->params['student']->id)
        // ->where('status' , 'COMPLETED')
        // ->orderBy('start','ASC')
        // ->get();
        $student = Student::find($this->student->id);

        $this->params['page'] = 'CLASSES_COMPLETED';
        // $this->params['classes'] = $classes;
        $this->params['classes_today'] = $student->getClassesToday();
        $this->params['classes'] = $student->getCompletedClasses();
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;

        return view('student.classes')->with($this->params);
    }

    public function index()
    {
    	
    	// $classes = ClassPeriod::where('student' , $this->params['student']->id)->where('status' ,'<>', 'CANCELLED')->orderBy('start','ASC')->get();
        $student = Student::find($this->student->id);
        $this->params['classes'] = $student->getClasses();
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
        $teachers_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->orderBy('teacher_id', 'desc')->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->orderBy('teacher', 'desc')->get();

        $this->params['classPeriods'] = $classPeriods;
        $this->params['teachers'] = $teachers;
        $this->params['teachers_scheds'] = $teachers_scheds;

        return view('student.bookbydate')->with($this->params);   
    }

    public function bookByTeacher($id, Request $request)
    {
        $student = Student::find($this->student->id);
        
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();
        

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

        $conflict_class = ClassPeriod::where('start', $start)
        ->where('end', $end)->where('teacher', $request->get('tutor_id'))->first();
        if($conflict_class){
            return redirect()->back()
                    ->withErrors(['Sorry! The seleted class schedule is already booked!']);
        }

        $classPeriod = new ClassPeriod;
        $classPeriod->student = $this->params['student']->id;
        $classPeriod->author = $this->params['user']->id;
        $classPeriod->teacher = $request->get('tutor_id');
        $classPeriod->course = $this->params['course']->id;
        $classPeriod->start = $start;
        $classPeriod->end = $end;
        $classPeriod->status = "BOOKED";
        $classPeriod->type = "REGULAR";
        $classPeriod->save();

        return redirect()->back()->withSuccess('You have successfully booked a classes!');

        // return redirect('student/classes')->withSuccess('You have successfully booked a classes!');
    }

    public function destroy($id, Request $request){

        $class = ClassPeriod::find($id); 
        $class->status = "CANCELED";
        $class->save();

        return redirect($request->url())->with($this->params);

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
