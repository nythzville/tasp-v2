<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;


class FrontController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function trial_class_application(Request $request){

        $name = $request->get('your_name');
        $email = $request->get('your_email');
        
        $to = "admin@ea-english.com";
        $subject = "Trial Class Application";

        $message = "
        <html>
        <head>
        <title>Trial Class Application</title>
        </head>
        <body>

        <p>Hi Admin, <br/> ".$name." is applying for Trial Class.</p>
        <p>
        <h3>Info</h3>
        Email: ".$email."<br/>
        Mobile: ".$request->get('your_mobile')."<br/>
        Skype: ".$request->get('your_skype')."<br/>
        QQ: ".$request->get('your_qq')."<br/>

        Proposed Schedule: ".$request->get('your_date')." ".$request->get('your_time')."<br/>
        Lesson: ".$request->get('your_lesson')."<br/>
        </p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.$email.'>' . "\r\n";

        mail($to,$subject,$message,$headers);
        return response()->json([ 'error' => false, 'message' => 'Request completed']);
    }
}
