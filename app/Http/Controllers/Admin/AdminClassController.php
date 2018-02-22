<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassPeriod;
use App\Student;

use Validator;
use DB;
use Carbon;

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
            $query = ClassPeriod::where('type', 'REGULAR')->where('status', '<>', 'CANCELED');
            
        }else if ($class_type == 'TRIAL')  {
            $query = ClassPeriod::where('type', 'TRIAL')->where('status', '<>', 'CANCELED');
            
        }else{
            $query = ClassPeriod::where('status', '<>', 'CANCELED');
            // $query = ClassPeriod::all();

        }

    	// $classes = ClassPeriod::where('type','REGULAR')->get();
    	

        $classes = $query->get();
        $this->params['classes'] = $classes;
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

                $course = $student->getCourse();
                $course->regular_classes_completed = (intval($course->regular_classes_completed) + 1);
                $course->save();
            }
        } 

        $class->evaluation = $evaluation_json;
        $class->status = "COMPLETED";

        $class->save();

        $this->params['msg'] = 'Evaluation Successfully Saved!';
        return redirect('admin/class')->with($this->params);
    }

    public function cancel_class($id){

        $class = ClassPeriod::find($id);
        if (!$class) {
            return redirect('admin/class');
        }

        $class->status      = 'CANCELLED';
        $class->save();
        
        return redirect('admin/class');

    }
}
