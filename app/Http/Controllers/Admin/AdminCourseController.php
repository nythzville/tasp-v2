<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use Validator;

class AdminCourseController extends Controller
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

    	$courses = Course::all();
    	$this->params['courses'] = $courses;

    	return view('admin.course.list')->with($this->params);
    }

    public function create()
    {
    	return view('admin.course.form')->with($this->params);
    }
    public function store(Request $request)
    {	
		// Define Course fields rules
        $rules = array(
            'name'          	   	 	=> 'required|min:1',
            'description'              	=> 'required|min:1',           
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return view('admin.course.form', $this->params);
        }

        // continue if no error occur
    	$course = new Course();
    	$course->name						= $request->get('name');
    	$course->description				= $request->get('description');

	    $course->save();
        
        return redirect('admin/course')->with($this->params);

    }
    public function edit($id)
    {
    	$course = Course::find($id);
    	$this->params['course'] = $course;
    	$this->params['action'] = 'edit';


    	return view('admin.course.form')->with($this->params);
    }
    public function update($id)
    {
    	// Define Student fields rules
        $rules = array(
           	'name'          	   	 	=> 'required|min:1',
            'description'              	=> 'required|min:1',            
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return view('admin.course.form', $this->params);
        }

        // continue if no error occur
    	$course = Course::find($id);
   		$course->name						= $request->get('name');
    	$course->description				= $request->get('description');

	    $course->save();
        return redirect('admin/course')->with($this->params);

    }
    public function destroy($id)
    {
    	
    }
}
