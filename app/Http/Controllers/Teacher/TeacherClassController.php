<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Teacher;
use App\TeacherSchedule;
use App\ClassPeriod;
use App\Student;

use Validator;
use Carbon;

class TeacherClassController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->teacher = Auth::user()->getTeacher();

            return $next($request);
        });

        $current_time = Carbon\Carbon::now('Asia/Manila');
       
        $this->params = array(
            'msg' => '',
            'page' =>'',
            'current_time' => $current_time,
        );
    }
    
    public function index(){

    	
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        
    	$this->params['classes'] = ClassPeriod::where('teacher', $teacher->id)
        ->where('status' , '<>', 'CANCELLED')
        ->get();

    	return view('teacher.classperiod')->with($this->params);
    }

    public function classes_today()
    {
        $teacher = Teacher::find($this->teacher->id);
        
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $this->params['page'] = 'CLASSES_TODAY';
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        $this->params['classes'] = $teacher->getClassesToday();
        
        return view('teacher.classperiod')->with($this->params);
    }

    public function completed_classes()
    {
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $this->params['page'] = 'COMPLETED_CLASSES';
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        $this->params['classes'] = $teacher->getCompletedClasses();
        
        return view('teacher.classperiod')->with($this->params);
    }

    public function booked_classes()
    {
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $this->params['page'] = 'BOOKED_CLASSES';
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        $this->params['classes'] = $teacher->getBookedClasses();
        
        return view('teacher.classperiod')->with($this->params);
    }

    public function upcoming_classes()
    {
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $this->params['page'] = 'UPCOMING_CLASSES';
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        $this->params['classes'] = $teacher->getUpcomingClasses();
        
        return view('teacher.classperiod')->with($this->params);
    }

    public function weekly_class(Request $request){

    	$teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();


        $week = $request->get('week');
        if($week){

            $mul = ($week * 7);
            $date = Date("Y-m-d");

            $date = Date("Y-m-d", strtotime( $date. '+'.$mul.' day' ));
            
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

        $teacher_scheds = TeacherSchedule::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher_id', $teacher->id)->where('status', 'OPEN')->get();

        $classPeriods = ClassPeriod::where('start', '>=', $date )->where('end', '<=', $until )->where('teacher', $teacher->id)->where('status', 'BOOKED')->get();

        $this->params['classPeriods'] = $classPeriods;
        // $this->params['teachers'] = $teachers;
        $this->params['teacher'] = $teacher;
        $this->params['teacher_scheds'] = $teacher_scheds;
        $this->params['page'] = 'weekly_classes';

        // dd($this->params['classes']);
    	return view('teacher.weeklyclasses')->with($this->params);
    }

    public function evaluate_trial_form($id){
        $teacher = Teacher::find($this->teacher->id);
        $class = ClassPeriod::find($id);
        if(!$class){
            return redirect()->back()->withErrors('No class found!');
        }
        if ($class->type != "TRIAL") {
            return redirect('teacher/classes')->withErrors('No class found!');
        }

        $student = Student::find($class->student);

        $student->progress_report = json_decode($class->evaluation);

        $this->params['class'] = $class;
        $this->params['student'] = $student;
        $this->params['teacher'] = $this->teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();

        $this->params['page'] = "EVALUATE_TRIAL";

        return view('teacher.progress-report')->with($this->params);
    }

    public function evaluate_trial($id, Request $request){
        
        $teacher = Teacher::find($this->teacher->id);
        $classperiod = ClassPeriod::find($id);
        
        if(!$classperiod){
            return redirect()->back()->withErrors('No class found!');
        }
        if ($classperiod->type != "TRIAL") {
            return redirect('teacher/classes')->withErrors('No class found!');
        }

        $progress_report = $request->all();
        unset($progress_report['_token']);
        
        $classperiod->evaluation = json_encode($progress_report);
        $classperiod->status = "COMPLETED";
        
        if($classperiod->save()){
            return redirect()->back()->withSuccess('Trial Class Evaluate Successfully!');
        }else{
            return redirect()->back()->withErrors('Unable to save Evaluation!');
        }
    }

    public function class_evaluation($id){

        $class = ClassPeriod::find($id);
        $class->evaluation = json_decode($class->evaluation);
        $this->params['class'] = $class;
        return response()->json($class);
        // return view('teacher.classperiod')->with($this->params);
    }

    public function update_class_evaluation($id, Request $request){
        
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $class = ClassPeriod::find($id);

        // Define Teacher fields rules
        $rules = array(

            // user 
            'date'                     => 'required|min:1',
            'attendance'               => 'required|min:1',
            'subject'                  => 'required|min:1',
            'topic'                    => 'required|min:1',  
            'comment'                  => 'required|min:1',          
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return view('teacher.classperiod', $this->params);
            // dd($messages);
        }

        $evaluation = $request->all();
        unset($evaluation["_token"]);

        $evaluation_json = json_encode($evaluation);
        // dd($evaluation_json);

        if($class->evaluation == null){

            if($class->status == "BOOKED"){
                
                $student = Student::find($class->getStudent->id);
                // $student->available_class = ($student->available_class - 1);
                // $student->save();

                $course = $student->getCourse($class->teacher);
                $course->regular_classes_completed = (intval($course->regular_classes_completed) + 1);
                $course->save();
            }
        }       

        $class->evaluation = $evaluation_json;
        $class->status = "COMPLETED";

        $class->save();

        // $this->params['msg'] = 'Evaluation Successfully Saved!';
        return redirect()->back()->withSuccess('Evaluation Successfully Saved');
    }
}
