<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Teacher;
use App\ClassPeriod;

use Validator;
use Carbon;

class TeacherProfileController extends Controller
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

    	$user = Auth::user();

        $today = date("Y-m-d");
        $until = Date("Y-m-d +1 day");

        $classes = ClassPeriod::where('teacher' , $this->params['teacher']->id)
        ->where('start' , '<=', $today)
        ->where('end' , '>=', $until)
        ->get();
        $this->params['classes_today'] = $classes;

    	$this->params['user'] = $user;
    	$this->params['teacher'] = Teacher::where('user_id', $user->id)->first();

    	return view('teacher.profile')->with($this->params);
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
            
            $thumbnail_path = "video-thumbnail.png";
            
            
            $avatar_data = json_decode($request->get('avatar_data'));
                
            $thumbnail_path = "thumbnail-".$image_name;
            $image = Image::make(sprintf('uploads/%s', $image_name));
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

        return response()->json(array( 'state' => 200, 'result' => $path, 'message' => 'Profile Image Successfully updated!'));
    }

    public function update($id, Request $request){


        if( $id == $this->params['teacher']->id ){

            $teacher = Teacher::find($id);

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

            $teacher->lastname = $request->get('lastname');
            $teacher->firstname = $request->get('firstname');
            $teacher->dob = $request->get('dob');
            $teacher->save();

            return redirect('teacher/profile')->with($this->params);

        }

    }

    public function edit_desc(Request $request){

        $teacher = Teacher::find($this->params['teacher']->id);
        $desc = $request->get('desc');

        $teacher->desc      = $desc;
        $teacher->save();

        return redirect('teacher/profile')->with($this->params);

    }

    public function recording(Request $request){

        $teacher = Teacher::find($this->params['teacher']->id);
        // Get uploaded file
        $file = $request->file('recording');
        // Generate name
        $recording_name =  $teacher->id."-".strtolower($teacher->firstname)."-recording".".".$file->getClientOriginalExtension();
        // Get Extension
        $extension = $file->getClientOriginalExtension();

        // IF not mp3
        if( $extension != "mp3"){
            return redirect('teacher/profile')->withErrors("File must have mp3 extension.");
        }

        // if file exist
        if(file_exists('recordings/'.$recording_name)){
            unlink('recordings/'.$recording_name);      
        }

        if(!$file->move('recordings', $recording_name)){
            return redirect('teacher/profile')->withErrors("Error uploading audio recording.");
        }else{
            return redirect('teacher/profile')->withSuccess("Successfully uploaded recording.");

        }
    }
}
