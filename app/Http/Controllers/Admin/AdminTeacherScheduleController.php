<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use App\TeacherSchedule;

use App\User;

use Auth;
use Validator;

class AdminTeacherScheduleController extends Controller
{
    
    public function __construct()
    {
        $user = Auth::user();

        $this->params = array(
            'msg' => '',
            'error' => false,
            'current_user' => $user,
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
        
        return response()->json(array('error'=> 'false',
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

        $schedule = TeacherSchedule::find($id);

        $schedule->start                = $request->get('schedule-date'). " " .$request->get('from-time');
        $schedule->end                  = $request->get('schedule-date'). " " .$request->get('to-time');
        $schedule->status               = $request->get('status');

        $schedule->save();
        
        return redirect('admin/teacher/'.$teacher->id.'/schedule')->with($this->params);
    }


}
