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

class AgentTeacherController extends Controller
{
    //
    public function index()
    {

    	$teachers = Teacher::all();
    	$this->params['teachers'] = $teachers;

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

        return view('agent.teacher-profile')->with($this->params);

    }
}