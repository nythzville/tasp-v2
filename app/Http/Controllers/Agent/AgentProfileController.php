<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Agent;
use App\ClassPeriod;
use App\Student;

use Validator;
use Carbon;

class AgentProfileController extends Controller
{
    //

	public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->agent = Auth::user()->getAgent();

            return $next($request);
        });
        $current_time = Carbon\Carbon::now('Asia/Manila');
    
        $this->params = array(
            'msg' => '',
            'page' =>'',
        );
    }

    public function index(){

    	$agent = agent::find($this->agent->id);
        $this->params['agent'] = $agent;
        $this->params['user'] = $this->user;
        $this->params['students'] = Student::where('agent_id', $this->agent->id)->get();
        $current_time = Carbon\Carbon::now('Asia/Manila');

    	return view('agent.profile')->with($this->params);
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

            $user = User::find($this->user->id);
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


   
}
