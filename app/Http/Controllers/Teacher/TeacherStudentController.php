<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

class TeacherStudentController extends Controller
{
    //
    public function __construct()
    {
        $user = Auth::user();
        $teacher = Teacher::where('user_id', $user->id)->first();

        $current_time = Carbon\Carbon::now('Asia/Manila');
        $today = date("Y-m-d H:i" , strtotime($current_time));
        $pending_evaluation_classes = ClassPeriod::where('teacher' , $teacher->id )
        ->where('status' , '<>', 'CANCELLED')
        ->where('status' , '<>', 'COMPLETED')
        ->where('start' , '<=', $today)
        ->get();

        $this->params = array(
            'msg' => '',
            'page' =>'',
            'user' => $user,
            'teacher'=> $teacher,
            'current_time' => $current_time,
            'pending_evaluation_classes'=> $pending_evaluation_classes,
        );
    }

    public function index()
    {

    	$students = Student::all();
    	$this->params['students'] = $students;

    	return view('teacher.student-list')->with($this->params);
    }


    public function show($id)
    {
        $student = Student::find($id);
        if(!$student){
            return redirect('teacher/student');
        }
        if($student->getCompletedClassesWithId($this->params['teacher']->id) >= 10 ){
            $student->progress_report = json_decode($student->getCourse()->report);            
        }
        $this->params['student'] = $student;

        // get all today

        $classes = ClassPeriod::where('student' , $id)
        ->where('teacher', $this->params['teacher']->id)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','DESC')
        ->get();

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('teacher', $this->params['teacher']->id)
        ->where('status' , 'COMPLETED')
        ->get();

        $this->params['completed_classes'] = $completed_classes;
        $this->params['classes'] = $classes;
        
        
        return view('teacher.student-profile')->with($this->params);
    }


    public function get_classes($id){

        $student = Student::find($id);
        $classes =  ClassPeriod::where('student_id', $id)->get();

        $this->params['student'] = $student;
        $this->params['classes'] = $classes;

        return response()->json($this->params);
    }

    public function progress_report($id, Request $request){
        
        $student = Student::find($id);
        $course = $student->getCourse();
        $progress_report = $request->all();
        $progress_report['teacher'] =  $this->params['teacher']->id;
        unset($progress_report['_token']);
        $course->report = json_encode($progress_report);
        
        if($course->save()){
            return redirect()->back()->withSuccess('Progress Report Successfully Saved!');
        }else{
            return redirect()->back()->withErrors('Unable to save Progress Report!');
        }

    }
}