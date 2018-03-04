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
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->teacher = Auth::user()->getTeacher();

            return $next($request);
        });
        $current_time = Carbon\Carbon::now('Asia/Manila');
        
        $this->params = array(
            'msg' => '',
            'page' =>'',
        );
    }

    public function index(){
        $teacher = Teacher::find($this->teacher->id);
        $this->params['teacher'] = $teacher;
        $this->params['user'] = $this->user;
        $this->params['pending_evaluation_classes'] = $teacher->getPendingEvaluationClasses();

        $this->params['news'] = News::orderBy('updated_at', 'desc')->get();
        
        return view('teacher.bulletinboard')->with($this->params);
    }
}