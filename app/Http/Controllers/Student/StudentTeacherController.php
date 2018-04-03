<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Auth;
use App\User;
use App\Student;
use App\Teacher;
use App\ClassPeriod;

use Carbon;
use DB;

class StudentTeacherController extends Controller
{
	//
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

	public function index(Request $request)
	{
        $student = Student::find($this->student->id);

        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();

		$search_key = $request->get('s');
		if($search_key!=null){
			$teachers = Teacher::where('lastname' , 'LIKE', '%'.$search_key.'%')
			->orWhere('firstname' , 'LIKE', '%'.$search_key.'%')
			->orWhere('teacher_id' , 'LIKE', '%'.$search_key.'%')
			->get();
		}else{
			$teachers = Teacher::all();
            // $teachers = Teacher::rightJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            // ->orderBy('teachers_rank.rank', 'ASC')
            // ->get();
		}
         $teachers = $teachers->map(function ($item, $key) {
            $item->rank = $item->rank;
            return $item;
        });
        $teachers = $teachers->sortBy('rank');
        
		$this->params['teachers'] = $teachers;
        $this->params['search_key'] = $search_key;
        
		return view('student.teacherslist')->with($this->params);
	}

	public function show($id){
        $student = Student::find($this->student->id);
        $user =  User::find($this->user->id);

        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        $this->params['classes_today'] = $student->getClassesToday();

		$teacher = Teacher::find($id);
		// if (!$teacher) {
  //           return redirect()->back()->withErrors('Teacher not found!');
  //       }
		$this->params['student'] = $student;
		$this->params['teacher'] = $teacher;

		$today = date("Y-m-d");
        $until = Date("Y-m-d +1 day");

        $classes = ClassPeriod::where('teacher' , $id )
        ->where('start' , '<=', $today)
        ->where('end' , '>=', $until)
        ->get();
        $this->params['classes_today'] = $classes;

		return view('student.teacherprofile')->with($this->params);
		
	}
}