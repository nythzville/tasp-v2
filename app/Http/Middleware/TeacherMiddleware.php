<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class TeacherMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if ($this->auth->guest()) {
            if ($request->ajax()) {
                
                return response('Unauthorized.', 401);
            
            } else {

                return redirect()->guest('/login');
            }

        }else{

            if($this->auth->user()->user_type=='TEACHER'){
            
                return $next($request);
            
            }else{
                
                // Redirect to home not an admin
                return redirect()->guest('login');
            }

        }

        return $next($request);

    }
}
