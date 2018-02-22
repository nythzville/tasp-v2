<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Teacher;
use App\ClassPeriod;
use App\News;

use Validator;
use Carbon;

class TeacherNewsController extends Controller
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
        );
    }

    public function index(){
        $this->params['news'] = News::orderBy('updated_at', 'desc')->get();
        
        return view('teacher.bulletinboard')->with($this->params);
    }
}