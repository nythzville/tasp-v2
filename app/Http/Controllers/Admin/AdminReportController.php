<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Agent;
use App\Student;
use App\Course;
use App\Teacher;
use App\TeacherSchedule;

use App\ClassPeriod;

use Validator;
use Carbon;

class AdminReportController extends Controller
{
    //
    public function __construct()
    {
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'error' => false,
            'current_time' => $current_time,

        );
    }

    public function index(Request $request)
    {

        $date_from = $request->get('from_date');
        $date_to = $request->get('to_date');

        $agents = Agent::all();

        $this->params['agents'] = $agents;
        $this->params['page'] = "REPORTS";
        $this->params['from_date'] = $request->get('from_date');
        $this->params['to_date'] = $request->get('to_date');

        return view('admin.reports')->with($this->params);
    }

}