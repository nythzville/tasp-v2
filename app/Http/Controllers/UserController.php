<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->auth->check()) {
            
            if($this->auth->user()->user_type =='ADMIN'){

                return redirect('/admin/dashboard');

            }elseif($this->auth->user()->user_type =='AGENT'){

                return redirect('/agent/profile');
            
            }elseif($this->auth->user()->user_type =='STUDENT'){

                return redirect('/student/profile');
            
            }elseif($this->auth->user()->user_type =='TEACHER'){

                return redirect('/teacher/profile');

            }else{
                return redirect('/login');
            }
        }
    }
}
