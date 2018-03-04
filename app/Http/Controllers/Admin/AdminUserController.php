<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


use App\User;
use App\Student;
use App\Teacher;
use App\Agent;

use Auth;
use Validator;
use Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->params = array(
            // 'msg' => '',
        );
    }

    public function index(Request $request)
    {

    	// If set what user type to query
    	$user_type = $request->get('user_type');
    	if($user_type){
	    	
	    	$users = User::where('user_type', $user_type)->get();
    	}else{
	    	$users = User::all();
    	}

    	$this->params['users'] = $users;

    	// dd($this->params);
    	return view('admin.user.list')->with($this->params);
    	
    }

    public function create()
    {

    	//
    	$this->params['action'] = 'new_user';

    	return view('admin.user.list')->with($this->params);
    }

    public function store(Request $request)
    {
    	//

    }
    

    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        if($user->user_type == "STUDENT"){

            $student = Student::where('user_id', $id)->first();
            $student->delete();

        }else if($user->user_type == "TEACHER"){

            $teacher = Teacher::where('user_id', $id)->first();
            $teacher->delete();

        }else if($user->user_type == "AGENT"){
            
            $agent = Agent::where('user_id', $id)->first();
            $agent->delete();
        }

        return redirect('admin/user')->with($this->params);
    }

    public function profile(){

        $user = Auth::user();

        $this->params['user'] = $user;
        return view('admin.profile')->with($this->params);
        
    }

    public function update_profile(Request $request){

        $user = Auth::user();

        $this->params['user'] = $user;

        // Define Student fields rules
        $rules = array(

            // password confirmation
            'old-password'              => 'required',
            'password'                  => 'required|min:6|confirmed',
            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect('admin/profile')
                    ->withErrors($validator)
                    ->withInput();
        }

        if(!Hash::check($request->get('old-password'),$user->password )){
            // $this->params['error'] = true;
            // $this->params['msg'] = 'Old Password is incorrect!';
            return redirect('admin/profile')->withErrors('Old Password is incorrect!');

        }

        $user->password             = bcrypt($request->get('password'));
        $user->save();
        // $this->params['error'] = false;
        // $this->params['msg'] = 'Password Successfully Changed!';

        return redirect('admin/profile')->withSuccess('Password Successfully Changed!');

    }

    // UPload Profile Picture
    public function crop_image(Request $request){
        $user = Auth::user();

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
            // $image = Image::make(sprintf('uploads/%s', $image_name));
            // $image->crop( intval($avatar_data->width), intval($avatar_data->height), intval($avatar_data->x) , intval($avatar_data->y) );
            // $image->save(sprintf('uploads/%s', $image_name));
            
           
            $path = url('uploads/' . $image_name);

            $user->user_image = 'uploads/' . $image_name;
            $user->save();

                           
        } catch (Exception $e) {

            return response()->json(array(
                'error'=> true,
                'msg'=> $e->getMessage(),
                ));
        }

        // return response()->json(array( 'state' => 200, 'agent' => $agent ));

        return response()->json(array( 'state' => 200, 'result' => $path, 'message' => 'Profile Image Successfully updated!'));
    }
}

