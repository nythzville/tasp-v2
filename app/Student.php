<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ClassPeriod;
use App\Course;

use Carbon;

class Student extends Model
{
    //
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function getAgent(){

        return $this->belongsTo('App\Agent', 'agent_id');

    }

    public function getClasses(){
        return $this->hasMany('App\ClassPeriod', 'student', 'id');  
    }

    public function getTrialClass(){
        return $this->hasOne('App\ClassPeriod', 'id','trial_class');
    }

    public function getTotalCompletedClasses($date_from = null, $date_to = null){
        $query = ClassPeriod::where('student', $this->id );
        $query->where('status', 'COMPLETED');
        if($date_from != null){
            $query->where('start', '>', date("Y-m-d",strtotime($date_from)));
        }
        if($date_to != null){
            $query->where('start', '<',date("Y-m-d",strtotime($date_to)));
        }
        
        $classes = $query->count();
        // dd($date_to);
        return $classes;
    }
    public function getCompletedClassesWithId($teacher_id = null){
        $query = ClassPeriod::where('student', $this->id )->where('teacher', $teacher_id )->where('status', 'COMPLETED')->count();
        return $query;

    }

    public function getCourse($teacher_id = null){
        return Course::where('student_id', $this->id )->where('teacher_id', $teacher_id )->where('status', 'Active')->first();
    }

    // Added V2
    public function getClassesToday(){
        
        $current_time = Carbon\Carbon::now('Asia/Manila');
        $today = date("Y-m-d", strtotime($current_time));
        $until = date("Y-m-d", strtotime($today. '+1 day'));
        // Get classes today
        $classes_today = ClassPeriod::where('student' , $this->id)
        ->where('start' , '>=', $today)
        ->where('end' , '<=', $until)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','ASC')
        ->get();

        return $classes_today;
    }
    public function getCompletedClasses(){
        
        $current_time = Carbon\Carbon::now('Asia/Manila');
        $today = date("Y-m-d", strtotime($current_time));
        $until = date("Y-m-d", strtotime($today. '+1 day'));
        // Get classes today
        $completed_today = ClassPeriod::where('student' , $this->id)
        
        ->where('status' , 'COMPLETED')
        ->orderBy('start','ASC')
        ->get();

        return $completed_today;
    }

    public function getUpcomingClasses(){
        
        $current_time = Carbon\Carbon::now('Asia/Manila');
        $today = date($current_time);
        $classes = ClassPeriod::where('student' , $this->id)
        ->where('start' , '>=', $today)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }

    public function getBookedClasses(){
        
        $classes = ClassPeriod::where('student' , $this->id)
        ->where('status' , 'BOOKED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }
}
