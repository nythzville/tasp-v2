<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Teacher;
use App\TeacherRanking;
use App\Agent;
use App\ClassPeriod;

use DB;
use Carbon;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'error' => false,
            'page' => 'dashboard',
            'current_time' => $current_time,
        );
    }

    public function index()
    {
        $this->params['students'] = Student::all();
        $this->params['teachers'] = Teacher::all();
        $this->params['agents'] = Agent::all();

        $this->params['rankings'] = TeacherRanking::orderBy('rank','asc')->limit(5)->get();

    	$this->params['student_count'] = Student::all()->count();
    	$this->params['teacher_count'] = Teacher::all()->count();
    	$this->params['agent_count'] = Agent::all()->count();

    	$this->params['classes_count'] = ClassPeriod::all()->count();
    	$this->params['completed_classes_count'] = ClassPeriod::where('status', 'COMPLETED')->count();
    	$this->params['booked_classes_count'] = ClassPeriod::where('status', 'BOOKED')->count();

        // $classes_by_date = ClassPeriod::where('status', 'COMPLETED')->get();
        $current_date = date("Y-m-d", strtotime(Carbon\Carbon::now('Asia/Manila')));
        $year_before =  date("Y-m-d", strtotime($current_date. " -1 Year"));

        // $classes_by_date = DB::table('classes')->select(DB::raw('date_format(start, %Y-%m) AS month'))->whereBetween('start',[$year_before,$current_date])->groupBy('month')->get();
        // $classes_by_date = DB::table('classes')->select('start')->whereBetween('start',[$year_before,$current_date])->groupBy('start')->get();


        // dd($classes_by_date);
        // dd($this->params);

        $current_time = date("Y-m-d H:i", strtotime($this->params['current_time']));


        if(ClassPeriod::count() > 0){
            $record_days = array();
            for($i = 31; $i > 1; $i = $i - 1 ) {
                $d = date( "Y-m-d", strtotime($current_time." -".$i." day"));
                $d2 = date( "Y-m-d", strtotime($current_time." -".($i - 1)." day"));

                $count = ClassPeriod::where('start','>',$d)->where('start','<',$d2)->count();

                // array_push($record_days, ['date' => strtotime($current_time." -".$i." day"), 'value' => $count ]);
                array_push($record_days, ['date' => $d, 'value' => $count ]);

            }
            $this->params['class_per_day'] = $record_days;

        }
    	return view('admin.dashboard')->with($this->params);
    }

    public function get_graph(){

        
    }

}
