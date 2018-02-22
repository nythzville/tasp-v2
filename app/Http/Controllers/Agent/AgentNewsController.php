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
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->agent = Auth::user()->getAgent();

            return $next($request);
        });
        $this->params = array(
            'msg' => '',
        );
    }

    public function index(){
        $this->params['news'] = News::orderBy('updated_at', 'desc')->get();
        return view('agent.bulletinboard')->with($this->params);
    }
}
