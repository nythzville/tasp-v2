<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Student;
use App\ClassPeriod;
use App\News;


use Validator;
use Carbon;

class StudentNewsController extends Controller
{
    //

    public function __construct()
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

    public function index(){
        $student = Student::find($this->student->id);
        $this->params['user'] = $this->user;
        
        $this->params['student'] = $this->student;
        $this->params['classes_today'] = $student->getClassesToday();
        
        $this->params['news'] = News::orderBy('updated_at', 'desc')->get();
        return view('student.bulletinboard')->with($this->params);
    }
}