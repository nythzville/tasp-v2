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
            'pending_evaluation_classes'=> $pending_evaluation_classes,
            'current_time' => $current_time,
        );
    }
    public function index(){

    	$user = Auth::user();
    	$teacher = Teacher::where('user_id', $user->id)->first();
    	$this->params['user'] = $user;
    	$this->params['teacher'] = $teacher;
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

        $schedule = new TeacherSchedule();
        $schedule->teacher_id                 = $request->get('teacher_id');
        $schedule->start                = $request->get('schedule-date'). " " .$request->get('from-time');
        $schedule->end                  = $request->get('schedule-date'). " " .$request->get('to-time');
        $schedule->status               = $request->get('status');

        $schedule->save();
        
        return response()->json(array('error'=> false,
            'msg' => 'Schedule Successfully Added!',
            'schedule' => $schedule));
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
