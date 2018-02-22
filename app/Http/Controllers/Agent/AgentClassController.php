<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassPeriod;
use App\Student;

use Validator;
use DB;
use Carbon;

class AgentClassController extends Controller
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

        $class_type = $request->get('type');
        
        if ($class_type == 'REGULAR')  {
            $query = ClassPeriod::where('type', 'REGULAR')->where('status', '<>', 'CANCELED');
            
        }else if ($class_type == 'TRIAL')  {
            $query = ClassPeriod::where('type', 'TRIAL')->where('status', '<>', 'CANCELED');
            
        }else{
            $query = ClassPeriod::where('status', '<>', 'CANCELED');
        }
       

        $classes = $query->get();
        $this->params['classes'] = $classes;
        return view('agent.classperiod-list')->with($this->params);
 
    }

    public function cancel_class($id){

        $class = ClassPeriod::find($id);
        if (!$class) {
            return redirect('agent/class');
        }

        $class->status      = 'CANCELED';
        $class->save();
        
        return redirect('agent/class');

    }
}
