<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use App\Agent;
use App\Student;
use Validator;

class AdminAgentController extends Controller
{
    
    public function __construct()
    {
        $this->params = array(
            'msg' => '',
            'error' => false,
        );
    }

    public function index()
    {

    	$agents = Agent::all();
    	$this->params['agents'] = $agents;

    	return view('admin.agent.list')->with($this->params);
    }

    public function create()
    {
        
    	return view('admin.agent.form')->with($this->params);
    }

    public function show($id){

        $agent = Agent::find($id);

        if(!$agent){
            return redirect('admin/agents/');
        }

        $students = Student::where('agent_id', $id)->get();
        $this->params['students'] = $students;
        $this->params['agent'] = $agent;

        return view('admin.agent.profile')->with($this->params);
    }
    public function store(Request $request)
    {	
		// Define Agent fields rules
        $rules = array(
            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            // 'gender'              		=> 'required|min:1',            
            // 'skype-id'              	=> 'required|min:1', 
            // 'qq-id'              		=> 'required|min:1',
            // 'dob'                       => 'required|min:1',
            'agent_id'                  => 'required|min:1',
            'username'                  => 'required|min:6',
            'email'                     => 'required|unique:users|max:255',
            'password'                  => 'required|min:6|confirmed',

            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $new_user = new User();
        $new_user->name                 = $request->get('username');
        $new_user->email                = $request->get('email');
        $new_user->password             = bcrypt($request->get('password'));
        $new_user->user_type            = "AGENT";

        $new_user->save();

        // continue if no error occur
    	$agent = new Agent();
        $agent->user_id                 = $new_user->id;
        $agent->agent_id                = $request->get('agent_id');    
    	$agent->lastname				= $request->get('lastname');
    	$agent->firstname				= $request->get('firstname');
        $agent->gender                  = $request->get('gender');
        $agent->dob                     = $request->get('dob');
    	$agent->skype					= $request->get('skype-id');
    	$agent->qq					    = $request->get('qq-id');

	    $agent->save();
        
        return redirect('admin/agents')->withSucess("Agent successfully added!");

    }
    public function edit($id)
    {
    	$agent = Agent::find($id);
    	$this->params['agent'] = $agent;
    	$this->params['action'] = 'edit';


    	return view('admin.agent.form')->with($this->params);
    }
    public function update($id, Request $request)
    {
    	// Define Agent fields rules
        $rules = array(
            'agent_id'                  => 'required|min:1',
            'lastname'          	    => 'required|min:1',
            'firstname'              	=> 'required|min:1',
            'password'                  => 'required|min:6|confirmed',

            // 'gender'              		=> 'required|min:1',            
            // 'skype-id'              	=> 'required|min:1', 
            // 'qq-id'              		=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        
        // continue if no error occur
    	$agent = Agent::find($id);

        $agent->agent_id                = $request->get('agent_id');    
        $agent->lastname                = $request->get('lastname');
        $agent->firstname               = $request->get('firstname');
        $agent->gender                  = $request->get('gender');
        $agent->dob                     = $request->get('dob');
        $agent->skype                   = $request->get('skype-id');
        $agent->qq                      = $request->get('qq-id');
	    $agent->save();

        // update user password
        $user = User::find($agent->user_id);
        $user->password             = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->withSuccess('Agent information successfully updated!');

    }
    public function destroy($id)
    {
        
        $agent = Agent::find($id);
        $user = User::find($agent->user_id);

        $agent->delete();
        $user->delete();
        
        return redirect('admin/agents')->withSuccess('Agent Successfully Deleted!');

    }

    // UPload Profile Picture
    public function crop_image($id, Request $request){
        $agent  = Agent::find($id);
        $user = User::find($agent->getUser->id);

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
