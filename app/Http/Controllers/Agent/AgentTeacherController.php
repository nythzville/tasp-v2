<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use App\TeacherSchedule;
use App\ClassPeriod;
use App\Agent;
use App\Course;
use App\User;

use Auth;
use Carbon;

class AgentTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->agent = Auth::user()->getAgent();

            return $next($request);
        });

        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'page' => '',
            'current_time' => $current_time,

        );
    }
    //
    public function index()
    {
       

    	$teachers = Teacher::orderBy('firstname', 'ASC')->get();
        $agent = Agent::where('user_id', $this->user->id)->first();

    	$this->params['teachers'] = $teachers;
        $this->params['agent'] = $agent;

    	return view('agent.teacher-list')->with($this->params);
    }

    public function get_teacher_sched($id, Request $request){

        $date = $request->get('date');
        if($date){

            $date = Date("Y-m-d", strtotime( $date ));
            $until = Date("Y-m-d", strtotime( $date . ' +1 day'));
            $this->params['date'] = $date;
        }else{

            $date = Date("Y-m-d");
            $until = Date("Y-m-d", strtotime( $date . ' +1 day'));
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

    public function show($id)
    {
        $user = Auth::user();
        $teacher = Teacher::find($id);

        $this->params['user'] = $user;
        $this->params['teacher'] = $teacher;
        $agent = Agent::where('user_id', $this->user->id)->first();
        $this->params['agent'] = $agent;

        $this->params['teacher'] = $teacher;

        return view('agent.teacher-profile')->with($this->params);

    }
}
