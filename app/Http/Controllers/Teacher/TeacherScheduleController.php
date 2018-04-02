<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use App\TeacherSchedule;
use App\ClassPeriod;

use Auth;
use Validator;
use Carbon;

class TeacherScheduleController extends Controller
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
        
        $this->params['page'] = 'schedule';
    	$this->params['schedules'] = TeacherSchedule::where('teacher_id', $teacher->id)->get();

    	return view('teacher.schedule')->with($this->params);
    }

    public function store(Request $request){

        // Define Student fields rules
        $rules = array(

            // Schedule fields 
            'teacher_id'                => 'required|min:1',
            'schedule-date'             => 'required|min:1',
            'from-time'                 => 'required|min:1',
            'to-time'                   => 'required|min:1',
            'status'                    => 'required|min:1',
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            
            return response()->json(array('error'=> true,
            'msg' => 'Error Adding Schedule!'));

        }

        if(date(strtotime($this->params['current_time'])) > date(strtotime(($request->get('schedule-date'). " " .$request->get('from-time'))) )){

            return response()->json(array('error'=> true,
            'msg' => 'Cannot open schedule with date and time already passed!'));
            // return redirect()->back()->withErrors('Cannot open schedule with date and time already passed!');
        }

        $teacher = Teacher::find(intval($request->get('teacher_id')));
        if (!$teacher) {
            return response()->json(array('error'=> true,
            'msg' => "Teacher not found!"));
        }

        $start = date("Y-m-d H:i", strtotime($request->get('schedule-date'). " " .$request->get('from-time')));
        $end = date("Y-m-d H:i", strtotime($request->get('schedule-date'). " " .$request->get('to-time')));
        $conflict = TeacherSchedule::where('teacher_id',$teacher->id)->where(function($q) use ($start, $end) {
            $q->where(function($query) use ($start, $end){
                    $query->where('start','>=', $start)
                          ->where('start','<',$end);
                })
              ->orWhere(function($query) use ($start, $end) {
                    $query->where('end', '>', $start)
                          ->where('end', '<=', $end);
                });
            })->count();
        if ($conflict > 0 ) {
            return response()->json(array('error'=> true,
            'msg' => "Your schedule conflicts with some of your schedule!"));
        }
        

        /* -- Cutting scheds into 30mins -- */
        $sched_cut = date("H:i", strtotime($request->get('from-time')));
        $sched_limit = date("H:i", strtotime($request->get('to-time')));
        $sched_ids = array();
        while ($sched_cut < $sched_limit) {
            $sched_offset = date("H:i", strtotime($sched_cut."+30 minutes"));

            $schedule = new TeacherSchedule();
            $schedule->teacher_id                 = $request->get('teacher_id');
            $schedule->start                = $request->get('schedule-date'). " " .$sched_cut;
            $schedule->end                  = $request->get('schedule-date'). " " .$sched_offset;
            $schedule->status               = $request->get('status');
            $schedule->save();

            // add id on list of scheds added
            array_push($sched_ids, $schedule->id);

            // move the time cut
            $sched_cut = $sched_offset;
        }

        $scheds = TeacherSchedule::find($sched_ids);
        return response()->json(array('error'=> false,
            'msg' => 'Schedule Successfully Added!',
            'schedules' => $scheds));
        // return redirect('teacher/schedule')->withSuccess('Schedule Successfully Added!');
      
    }

    public function update( $id, Request $request){

        // Define Student fields rules
        $rules = array(

            // Schedule fields 
            'teacher_id'                => 'required|min:1',
            'schedule-date'             => 'required|min:1',
            'from-time'                 => 'required|min:1',
            'to-time'                   => 'required|min:1',
            'status'                    => 'required|min:1',
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            
        }

        $schedule = TeacherSchedule::find($id);
        $schedule->teacher_id           = $request->get('teacher_id');
        $schedule->start                = $request->get('schedule-date'). " " .$request->get('from-time');
        $schedule->end                  = $request->get('schedule-date'). " " .$request->get('to-time');
        $schedule->status               = $request->get('status');

        $schedule->save();

        return redirect('teacher/schedule')->withSuccess('Schedule Successfully Updated!');

    }
}
