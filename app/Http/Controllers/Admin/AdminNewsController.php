<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;

use Validator;
use Auth;

class AdminNewsController extends Controller
{

	public function __construct()
    {
        $user = Auth::user();
        $this->params = array(
            'msg' => '',
            'error' => false,
            'user' => $user,
        );
    }
    public function index()
    {

    	$news_list = News::all();
    	$this->params['news_list'] = $news_list;

    	return view('admin.news.list')->with($this->params);
    }

    public function create()
    {
    	return view('admin.news.form')->with($this->params);
    }

    public function store(Request $request)
    {

    	// Define News fields rules
        $rules = array(

            // user 
            'title'                  => 'required|min:1',
            'display-option'         => 'required|min:1',
            'content'                => 'required|min:1',    
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            // return view('admin.news.form', $this->params);
            return redirect()->back()->withErrors()->withInputs();

        }

        // dd($request->all());
        $news =  new News();
        $news->setting = json_encode( array('display-option' => $request->get('display-option')));
        $news->status = ($request->get('active') == "on" )? "Active" : "Inactive" ;
        $news->title = $request->get('title');
        $news->content = $request->get('content');
        $news->author = $this->params['user']->id;

        $news->save();

        return redirect('admin/news')->with($this->params);

    }

    public function edit($id){
        $news = News::find($id);
        $this->params['news'] = $news;
        $this->params['action'] = 'edit';
        return view('admin.news.form')->with($this->params);
    }

    public function update($id, Request $request){

        // Define News fields rules
        $rules = array(

            // user 
            'title'                  => 'required|min:1',
            'display-option'         => 'required|min:1',
            'content'                => 'required|min:1',    
            );

        // Validate data
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            $messages = $validator->messages()->getMessages();
            $this->params['error'] = true;
            foreach ($messages as $field_name => $message) {
                $this->params['msg'] .= '<br/>'.$message[0];
            }
            return redirect()->back()->withErrors()->withInputs();
        }

        $news =  News::find($id);
        if (!$news) {
            return redirect()->back()->withErrors('News not found!');
            
        }
        $news->setting = json_encode( array('display-option' => $request->get('display-option')));
        $news->status = ($request->get('active') == "on" )? "Active" : "Inactive" ;
        $news->title = $request->get('title');
        $news->content = $request->get('content');
        $news->author = $this->params['user']->id;
        
        $news->save();

        return redirect('admin/news')->with($this->params);
        
    }
}
