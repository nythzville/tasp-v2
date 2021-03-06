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

    public function index()
    {
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();

    	$students = Student::all();
    	$this->params['students'] = $students;
    	return view('teacher.student-list')->with($this->params);
    }


    public function show($id)
    {
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();

        $student = Student::find($id);
        if(!$student){
            return redirect('teacher/student');
        }
        if($student->getCompletedClassesWithId($this->teacher->id) >= 10 ){
            $student->progress_report = json_decode($student->getCourse($teacher->id)->report);            
        }

        // get all today

        $classes = ClassPeriod::where('student' , $id)
        ->where('teacher', $teacher->id)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','DESC')
        ->get();

        $current_course = $student->getCourse($this->teacher->id);
        $courses_with_pr = Course::where('student_id',$student->id)
        ->where('regular_classes_completed','>=', 20)
        ->get();
        $this->params['courses_with_pr'] = $courses_with_pr;
        $progress_report = $current_course->report;
        $student->progress_report = json_decode($progress_report); 

        $completed_classes = ClassPeriod::where('student' , $id)
        ->where('teacher', $teacher->id)
        ->where('status' , 'COMPLETED')
        ->get();

        $this->params['student'] = $student;

        $this->params['completed_classes'] = $completed_classes;
        $this->params['completed_classes_num'] = $current_course->regular_classes_completed;
        $this->params['classes'] = $classes;
        $this->params['current_course'] = $current_course;
        
        
        return view('teacher.student-profile')->with($this->params);
    }


    public function get_classes($id){

        $student = Student::find($id);
        $classes =  ClassPeriod::where('student_id', $id)->get();

        $this->params['student'] = $student;
        $this->params['classes'] = $classes;

        return response()->json($this->params);
    }

    public function progress_report($id, $course_id, Request $request){
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();
        
        $student = Student::find($id);
        $course = Course::find($course_id);
        if ((!$student)||(!$course)) {
            return redirect()->back()->withErrors('Invalid!');
            
        }
        $progress_report = $request->all();
        $progress_report['teacher'] =  $this->teacher->id;
        unset($progress_report['_token']);
        $course->report = json_encode($progress_report);
        
        if($course->save()){
            return redirect()->back()->withSuccess('Progress Report Successfully Saved!');
        }else{
            return redirect()->back()->withErrors('Unable to save Progress Report!');
        }

    }

    public function progress_report_get($id, $course_id){
        $user = Auth::user();
        $teacher = Teacher::find($this->teacher->id);
        $student = Student::find($id);
        $course = Course::find($course_id);

        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();

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
        return view('teacher.progress-report')->with($this->params);

    }
    
}