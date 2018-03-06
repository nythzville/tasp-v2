<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use App\TeacherSchedule;
use App\ClassPeriod;

use App\User;

use Auth;
use Validator;
use Carbon;

class AdminTeacherScheduleController extends Controller
{
    
    public function __construct()
    {
        // $user = Auth::user();
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $current_time = Carbon\Carbon::now('Asia/Manila');
        
        $this->params = array(
            'msg' => '',
            'error' => false,
            'current_time' => $current_time,

            // 'current_user' => $user,
        );
    }

    public function index($teacher_id)
    {

    	$teacher = Teacher::find($teacher_id);
    	$this->params['teacher'] = $teacher;
        $this->params['page'] = 'teacher_schedule';
    	$this->params['schedules'] = TeacherSchedule::where('teacher_id', $teacher->id)->get();

    	return view('admin.teacher.schedule')->with($this->params);
    }

    public function store(Request $request, $teacher_id)
    {

    	$teacher = Teacher::find($teacher_id);
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
            return response()->json(array('error' => true, 'Invalid Inputs!'));
        }
        if (!$teacher) {
            return response()->json(array('error'=> true,
            'msg' => "Teacher not found!"));
        }

        if(date(strtotime($this->params['current_time'])) > date(strtotime(($request->get('schedule-date'). " " .$request->get('from-time'))) )){

            return response()->json(array('error'=> true,
            'msg' => 'Cannot open schedule with date and time already passed!'));
            // return redirect()->back()->withErrors('Cannot open schedule with date and time already passed!');
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
        $schedule->teacher_id           = $teacher->id;
        $schedule->start                = $request->get('schedule-date'). " " .$request->get('from-time');
        $schedule->end                  = $request->get('schedule-date'). " " .$request->get('to-time');
        $schedule->status               = $request->get('status');

        $schedule->save();
        
        return response()->json(array('error'=> false,
            'msg' => 'Schedule Successfully Added!',
            'schedule' => $schedule));

        // return redirect('admin/teacher/'.$teacher->id.'/schedule')->with($this->params);
    }

    public function update(Request $request, $teacher_id, $id)
    {

    	$teacher = Teacher::find($teacher_id);
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
            return redirect('admin/teacher/'.$teacher_id.'/schedule')
                    ->withErrors($validator)
                    ->withInput();
        }

        $start = date("Y-m-d H:i", strtotime($request->get('schedule-date'). " " .$request->get('from-time')));
        $end = date("Y-m-d H:i", strtotime($request->get('schedule-date'). " " .$request->get('to-time')));

        $schedule = TeacherSchedule::find($id);

        // get confilct classes
        $conflicts = ClassPeriod::where('teacher', $teacher_id)
        ->where('start', '>=', $schedule->start)
        ->where('end', '<=', $schedule->end)
        ->get();

        $conflicts2 = ClassPeriod::where('teacher', $teacher_id)
        ->where('start', '>=', $start)
        ->where('end', '<=', $end)
        ->get();

        if($request->get('status') == "CLOSED"){
            if(count($conflicts) > 0){
            return redirect()->back()->withErrors("Cannot close schedule with a booked class!");
            }
        }

        if(count($conflicts) != count($conflicts2) ){
            $class_list = "";
            foreach ($conflicts as $class) {
                $class_list .= "From: ".date("m/d/y h:i", strtotime($class->start))." - to: ".date("m/d/y h:i", strtotime($class->end))." Student: ".$class->getStudent->firstname. "\n";
            }

            return redirect()->back()->withErrors("There is a class booked on this schedule! \n".$class_list);
        }

        $schedule->start                = $request->get('schedule-date'). " " .$request->get('from-time');
        $schedule->end                  = $request->get('schedule-date'). " " .$request->get('to-time');
        $schedule->status               = $request->get('status');

        $schedule->save();
        
        return redirect()->back()->withSuccess("Schedule successfully updated!");
    }


}
