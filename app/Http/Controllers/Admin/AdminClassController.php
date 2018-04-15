<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassPeriod;
use App\Student;
use App\Teacher;


use Validator;
use DB;
use Carbon;

use Auth;

class AdminClassController extends Controller
{
    //
    public function __construct()
    {
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'error' => false,
            'current_time' => $current_time,

        );
    }

    public function index(Request $request)
    {

        $class_type = $request->get('type');
        
        if ($class_type == 'REGULAR')  {
            $classes = ClassPeriod::where('type', 'REGULAR')->where('status', '<>', 'CANCELLED')->latest()->paginate(10);
            
        }else if ($class_type == 'TRIAL')  {
            $classes = ClassPeriod::where('type', 'TRIAL')->where('status', '<>', 'CANCELLED')->latest()->paginate(10);
            
        }else{
            $classes = ClassPeriod::where('status', '<>', 'CANCELLED')->latest()->paginate(10);
            // $query = ClassPeriod::all();

        }

    	// $classes = ClassPeriod::where('type','REGULAR')->get();
    	
        // $classes = $query->get();
        $this->params['classes'] = $classes;

        // echo $classes->lastPage();
        return view('admin.classperiod.list')->with($this->params);
        // dd($classes);
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

        dd($request->all());
        // Define Class fields rules
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

    }

    public function destroy($id){
        $class = ClassPeriod::find($id);
        if (!$class) {
            return redirect()->back()->withErrors('Class not found!');
        }

        $class->delete();
        
        return redirect()->back()->withSuccess('Class Successfully Deleted!');
    }

    // Evaluation
    public function class_evaluation($id){

        $class = ClassPeriod::find($id);
        $class->evaluation = json_decode($class->evaluation);
        $this->params['class'] = $class;
        return response()->json($class);
        // return view('teacher.classperiod')->with($this->params);
    }

    public function update_class_evaluation($id, Request $request){

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
            // $messages = $validator->messages()->getMessages();
            // $this->params['error'] = true;
            // foreach ($messages as $field_name => $message) {
            //     $this->params['msg'] .= '<br/>'.$message[0];
            // }
            // return view('admin.classperiod.list', $this->params);
            // dd($messages);
            return redirect('admin/class')->with($this->params);

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

                $course = $student->getCourse($class->teacher);
                $course->regular_classes_completed = (intval($course->regular_classes_completed) + 1);
                $course->save();
            }
        } 

        $class->evaluation = $evaluation_json;
        $class->status = "COMPLETED";

        $class->save();

        // $this->params['msg'] = 'Evaluation Successfully Saved!';
        return redirect()->back()->withSuccess('Evaluation Successfully Saved!');
    }

    public function evaluate_trial_form($id){
        $class = ClassPeriod::find($id);
        $teacher = Teacher::find($class->teacher);
        $student = Teacher::find($class->student);

        if(!$class){
            return redirect()->back()->withErrors('No class found!');
        }
        if ($class->type != "TRIAL") {
            return redirect('admin/classes')->withErrors('No class found!');
        }

        $student = Student::find($class->student);

        $student->progress_report = json_decode($class->evaluation);

        $this->params['class'] = $class;
        $this->params['student'] = $student;
        $this->params['teacher'] = $teacher;
        $this->params['user'] = Auth::user();

        $this->params['page'] = "EVALUATE_TRIAL";

        return view('admin.classperiod.progress-report')->with($this->params);
    }

    public function evaluate_trial($id, Request $request){
        
        $class = ClassPeriod::find($id);
        $teacher = Teacher::find($class->teacher);
        $student = Teacher::find($class->student);

        if(!$class){
            return redirect()->back()->withErrors('No class found!');
        }
        if ($class->type != "TRIAL") {
            return redirect('admin/classes')->withErrors('No class found!');
        }

        $progress_report = $request->all();
        unset($progress_report['_token']);
        
        $class->evaluation = json_encode($progress_report);
        $class->status = "COMPLETED";
        
        if($class->save()){
            return redirect()->back()->withSuccess('Trial Class Evaluate Successfully!');
        }else{
            return redirect()->back()->withErrors('Unable to save Evaluation!');
        }
    }

    public function cancel_class($id){

        $class = ClassPeriod::find($id);
        if (!$class) {
            return redirect()->back()->withErrors('Class not found!');
        }

        $class->status      = 'CANCELLED';
        $class->save();
        
        return redirect()->back()->withSuccess('Class Successfully Cancelled!');

    }
}
