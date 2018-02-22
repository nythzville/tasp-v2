<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Agent;
use App\News;

class AgentNewsController extends Controller
{
    //

    public function __construct()
    {
        $user = Auth::user();
        $agent = Agent::where('user_id', $user->id)->first();
        $this->params = array(
            'msg' => '',
            'user' => $user,
            'agent' => $agent,
        );
    }

    public function index(){
        $this->params['news'] = News::orderBy('updated_at', 'desc')->get();
        return view('agent.bulletinboard')->with($this->params);
    }
}
