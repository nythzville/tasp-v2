<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Teacher;
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

    public function weekly_class(){

    	$teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;

        $this->params['page'] = 'weekly_classes';
    	$this->params['classes'] = ClassPeriod::where('teacher', $teacher->id)->get();


    	return view('teacher.weeklyclasses')->with($this->params);
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
                $student->available_class = ($student->available_class - 1);
                $student->save();

                $course = $student->getCourse();
                $course->regular_classes_completed = (intval($course->regular_classes_completed) + 1);
                $course->save();
            }
        }       

        $class->evaluation = $evaluation_json;
        $class->status = "COMPLETED";

        $class->save();

        $this->params['msg'] = 'Evaluation Successfully Saved!';
        return redirect('teacher/class')->with($this->params);
    }
}
