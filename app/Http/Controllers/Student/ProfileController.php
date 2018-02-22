<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
// use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\teacher;
use App\User;
use App\ClassPeriod;

use Validator;
use Auth;
use Image;
use Carbon;

class ProfileController extends Controller
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
    public function index()
    {
        $student = Student::find($this->student->id);

        $today = date("Y-m-d");
        $until = Date("Y-m-d +1 day");

        $classes_today = ClassPeriod::where('student' , $student->id)
        ->where('start' , '<=', $today)
        ->where('end' , '>=', $until)
        ->get();
        $completed_class_count = ClassPeriod::where('student' , $student->id)
        ->where('status', 'COMPLETED')
        ->count();
        
        $this->params['completed_class_count'] = $completed_class_count;
        $this->params['classes_today'] = $classes_today;
        $this->params['student'] = $this->student;
        $this->params['user'] = $this->user;
        
    	return view('student.profile')->with($this->params);	
    }

    public function crop_image(Request $request){

        try {
            // Get uploaded file
            $file = $request->file('avatar_file');
            // Generate name
            $image_name = time().".".$file->getClientOriginalExtension();
            // Get Extension
            $extension = $file->getClientOriginalExtension();
            // Move to uploads
            $file->move('uploads', $image_name);
            
            // Get Mimetype
            $mimetype = $file->getClientMimeType();
            $arr_mime = explode("/", $mimetype);
        
            
            $avatar_data = json_decode($request->get('avatar_data'));

            $image = Image::make(url('uploads/'. $image_name));
            $image->crop( intval($avatar_data->width), intval($avatar_data->height), intval($avatar_data->x) , intval($avatar_data->y) );
            $image->save(sprintf('uploads/%s', $image_name));
            
           
            $path = url('uploads/' . $image_name);

            $user = User::find($this->params['user']->id);
            $user->user_image = 'uploads/' . $image_name;
            $user->save();

                           
        } catch (Exception $e) {

            return response()->json(array(
                'error'=> true,
                'msg'=> $e->getMessage(),
                ));
        }

        return response()->json(array( 'state' => 200, 'result' => $path, 'file' => $file, 'message' => 'Profile Image Successfully updated!'));
    }

    public function update($id, Request $request){


        if( $id == $this->params['student']->id ){

            $student = Student::find($id);

            // Define Student fields rules
            $rules = array(
                'lastname'                  => 'required|min:1',
                'firstname'                 => 'required|min:1',
                'dob'                       => 'required|min:1',            
                          
            );
            
            // Validate data
            $validator = Validator::make( $request->all(), $rules );
            if ( $validator->fails() ) {
                $messages = $validator->messages()->getMessages();
                $this->params['error'] = true;
                foreach ($messages as $field_name => $message) {
                    $this->params['msg'] .= '<br/>'.$message[0];
                }
            }

            $student->lastname = $request->get('lastname');
            $student->firstname = $request->get('firstname');
            $student->dob = $request->get('dob');
            $student->save();

            return redirect('student/profile')->with($this->params);

        }

    }
    public function progress_report(){
        $student =  Student::find($this->params['student']->id); 
        $progress_report = $student->getCourse()->report;

        if (!empty($progress_report)) {
            
            $student->progress_report = json_decode($progress_report); 
            $this->params['student'] = $student;
            $this->params['teacher'] = $student->getCourse()->getTeacher(); 


        }else{

            return redirect('student/profile')->withErrors('No Progress report found!');
        }

        return view('student.progress-report')->with($this->params);
    }   
}
