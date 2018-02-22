<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

use App\Teacher;
use App\TeacherRanking;

use App\User;
use App\ClassPeriod;

use Auth;
use Validator;

use Carbon;

class AdminTeacherController extends Controller
{
    

    public function __construct()
    {
        $user = Auth::user();
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $this->params = array(
            'msg' => '',
            'error' => false,
            'current_user' => $user,
            'current_time' => $current_time,
        );
    }

    public function index()
    {

    	$teachers = Teacher::all();
    	$this->params['teachers'] = $teachers;

    	return view('admin.teacher.list')->with($this->params);
    }

    public function create()
    {
        $this->params['action'] = 'create';
        
    	return view('admin.teacher.form')->with($this->params);
    }
    public function store(Request $request)
    {	
		// Define Teacher fields rules
        $rules = array(

            // user 
            'username'                  => 'required|min:6',
            'email'                     => 'required|unique:users|max:255',
            'password'                  => 'required|min:6|confirmed',

            'teacher_id'                 => 'required|min:1',

            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'gender'              		=> 'required|min:1',            
            'skype-id'              	=> 'required|min:1', 
            'qq-id'              		=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect('admin/teacher/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $new_user = new User();
        $new_user->name                 = $request->get('username');
        $new_user->email                = $request->get('email');
        $new_user->password             = bcrypt($request->get('password'));
        $new_user->user_type            = "TEACHER";

        $new_user->save();


        // continue if no error occur
    	$teacher = new Teacher();
        $teacher->user_id               = $new_user->id;
        $teacher->teacher_id            = $request->get('teacher_id');
        $teacher->dob                   = $request->get('dob');
        $teacher->gender                = $request->get('gender');
    	$teacher->lastname				= $request->get('lastname');
    	$teacher->firstname				= $request->get('firstname');
    	$teacher->skype					= $request->get('skype-id');
    	$teacher->qq					= $request->get('qq-id');

	    $teacher->save();
        
        return redirect('admin/teacher')->with($this->params);

    }
    public function edit($id)
    {
    	$teacher = Teacher::find($id);
    	$this->params['teacher'] = $teacher;
    	$this->params['action'] = 'edit';


        // dd($this->params);
    	return view('admin.teacher.form')->with($this->params);
    }
    public function update($id, Request $request)
    {
    	// Define Teacher fields rules
        $rules = array(
            'teacher_id'                 => 'required|min:1',

            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'gender'              		=> 'required|min:1',            
            'skype-id'              	=> 'required|min:1', 
            'qq-id'              		=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect('admin/teacher/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        // continue if no error occur
    	$teacher = Teacher::find($id);
        $teacher->teacher_id            = $request->get('teacher_id');
        
        $teacher->dob                   = $request->get('dob');
    	$teacher->lastname				= $request->get('lastname');
    	$teacher->firstname				= $request->get('firstname');
    	$teacher->skype					= $request->get('skype-id');
    	$teacher->qq					= $request->get('qq-id');

	    $teacher->save();
        return redirect('admin/teacher')->with($this->params);

    }
    public function destroy($id)
    {
    	$teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('admin/teacher')->withSuccess('Teacher Successfully Deleted!');


    }

    public function profile($id)
    {
        $user = Auth::user();
        $teacher = Teacher::find($id);

        $classes = ClassPeriod::where('teacher' , $id)
        ->where('status' , '<>', 'CANCELED')
        ->orderBy('start','DESC')
        ->get();

        $completed_classes = ClassPeriod::where('teacher' , $id)
        ->where('status' , 'COMPLETED')
        ->get();
        $this->params['completed_classes'] = $completed_classes;
        $this->params['classes'] = $classes;

        $this->params['user'] = $user;
        $this->params['teacher'] = $teacher;

        return view('admin.teacher.profile')->with($this->params);

    }

    public function edit_desc(Request $request, $teacher_id){

        $teacher = Teacher::find($teacher_id);
        if(!$teacher){
            return redirect('admin/teacher')->with($this->params);   
        }
        $desc = $request->get('desc');

        $teacher->desc      = $desc;
        $teacher->save();

        return redirect('admin/teacher/'.$teacher_id.'/profile')->with($this->params);

    }

    // UPload Profile Picture
    public function crop_image($id, Request $request){
        $teacher  = Teacher::find($id);
        $user = User::find($teacher->getUser->id);

        try {
            // Get uploaded file
            $file = $request->file('avatar_file');
            // Generate name
            $image_name = time().".".$file->getClientOriginalExtension();
            // Get Extension
            $extension = $file->getClientOriginalExtension();
            
            // Move to uploads
            if($file->move('uploads', $image_name)){
                
                if( !empty($user->user_image )){
                    if(file_exists( sprintf('uploads/%s', $user->user_image ))){
                        unlink(sprintf('uploads/%s', $user->user_image ));
                    }
                }
            }
            
            // Get Mimetype
            $mimetype = $file->getClientMimeType();
            $arr_mime = explode("/", $mimetype);
            
            $thumbnail_path = "video-thumbnail.png";
            
            $avatar_data = json_decode($request->get('avatar_data'));
                
            $thumbnail_path = "thumbnail-".$image_name;
            $image = Image::make(sprintf('uploads/%s', $image_name));
            $image->crop( intval($avatar_data->width), intval($avatar_data->height), intval($avatar_data->x) , intval($avatar_data->y) );
            $image->save(sprintf('uploads/%s', $image_name));
            
           
            $path = url('uploads/' . $image_name);

            $user->user_image = 'uploads/' . $image_name;
            $user->save();

                           
        } catch (Exception $e) {

            return response()->json(array(
                'error'=> true,
                'msg'=> $e->getMessage(),
                ));
        }

        return response()->json(array( 'state' => 200, 'result' => $path, 'message' => 'Profile Image Successfully updated!'));
    }


    public function show_schedule($id){
        $teacher = Teacher::find($teacher_id);
        
    }

    public function ranking(){

        $rankings = TeacherRanking::orderBy('rank', 'asc')->get();
        $teachers = Teacher::all();


        // Remove teachers already on rank
        foreach ($teachers as $id => $teacher) {
            
            foreach ($rankings as $rank_teacher) {
                
                if ($teacher->id == $rank_teacher->getTeacher->id) {
                    unset($teachers[$id]);
                }
            }
        }

        $this->params['rankings'] = $rankings;
        $this->params['teachers'] = $teachers;

            // dd($this->params);

        return view('admin.teacher.ranking')->with($this->params);
    }

    public function ranking_post(Request $request){
        
        $ranking_order_str = $request->get('ranking-order');
        $ranking_order_arr = json_decode($ranking_order_str);

        $rank_len = count($ranking_order_arr);

        for($i = 1; $i <= $rank_len; $i++){
            
            // get rank
            $rank = TeacherRanking::where('rank', $i)->first();
            if($rank){
                $rank->rank = $i;
                $rank->teacher_id = $ranking_order_arr[($i - 1)];
            }else{
                $rank = new TeacherRanking;
                $rank->id = $i;
                $rank->rank = $i;
                $rank->teacher_id = $ranking_order_arr[($i - 1)];
            }

            $rank->save();
        }

        return redirect('admin/teacher/ranking')->withSuccess('Ranking Successfully Updated!');

    }

    public function recording($id, Request $request){

        $teacher = Teacher::find($id);
        // Get uploaded file
        $file = $request->file('recording');
        // Generate name
        $recording_name =  $teacher->id."-".strtolower($teacher->firstname)."-recording".".".$file->getClientOriginalExtension();
        // Get Extension
        $extension = $file->getClientOriginalExtension();

        // IF not mp3
        if( $extension != "mp3"){
            return redirect('admin/teacher/'.$id.'/profile')->withErrors("File must have mp3 extension.");
        }

        // if file exist
        if(file_exists('recordings/'.$recording_name)){
            unlink('recordings/'.$recording_name);      
        }

        if(!$file->move('recordings', $recording_name)){
            return redirect('admin/teacher/'.$id.'/profile')->withErrors("Error uploading audio recording.");
        }else{
            return redirect('admin/teacher/'.$id.'/profile')->withSuccess("Successfully uploaded recording.");

        }
    }
}
