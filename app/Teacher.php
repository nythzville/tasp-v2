<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\TeacherSchedule;

use Carbon;

class Teacher extends Model
{
    //
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';


     public static function getAvailableTeacher($start, $end){
    	
    	$teachers_scheds = TeacherSchedule::where( 'start', '<=', $start )->where( 'end', '>=', $end )->get();

    	$availableTeachers = Array();
    	foreach ($teachers_scheds as $sched) {

    		array_push($availableTeachers, $sched->teacher);

    	}
    	return $availableTeachers ;
    }

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
    public function hasSchedule($date){
        $until = date("Y-m-d", strtotime($date. "+1 day"));
        $teacher_sched = TeacherSchedule::where('teacher_id', $this->id)
        ->where('start','>=', $date)->where( 'end', '<', $until )->where('status', 'OPEN')->orderBy('start', 'ASC')->get();

        return $teacher_sched;
    }
    public function getRank(){
        return $this->hasOne('App\TeacherRanking');
    }

    public function getRegularClassesCount(){
        return count($this->hasMany('App\ClassPeriod', 'teacher')->where('status','COMPLETED')->where('type','REGULAR')->get() );
    }

    public function getTrialClassesCount(){
        return count($this->hasMany('App\ClassPeriod', 'teacher')->where('status','COMPLETED')->where('type','TRIAL')->get());
    }

    public function getRegularClassesCountByStudentId($student_id){
        return count($this->hasMany('App\ClassPeriod', 'teacher')->where('status','COMPLETED')->where('student', $student_id)->where('type','REGULAR')->get() );
    }
    public function getTrialClassesCountByStudentId($student_id){
        return count($this->hasMany('App\ClassPeriod', 'teacher')->where('status','COMPLETED')->where('student', $student_id)->where('type','TRIAL')->get());
    }

    // Added version 2

    public function getPendingEvaluationClasses(){
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $today = date("Y-m-d H:i" , strtotime($current_time));
        $pending_evaluation_classes = ClassPeriod::where('teacher' , $this->id )
        ->where('status' , '<>', 'CANCELLED')
        ->where('status' , '<>', 'COMPLETED')
        ->where('start' , '<=', $today)
        ->get();

        return $pending_evaluation_classes;

    }

    public function getClassesToday(){
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $today = Date("Y-m-d", strtotime($current_time));
        $until = Date("Y-m-d", strtotime($today. '+1 day'));

        $classes = ClassPeriod::where('teacher' , $this->id )
        ->where('start' , '>=', $today)
        ->where('end' , '<=', $until)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }

    public function getUpcomingClasses(){
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $today = Date($current_time);

        $classes = ClassPeriod::where('teacher' , $this->id )
        ->where('start' , '>=', $today)
        ->where('status' , '<>', 'CANCELLED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }

    public function getCompletedClasses(){
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $today = Date($current_time);

        $classes = ClassPeriod::where('teacher' , $this->id )
        ->where('status' , 'COMPLETED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }

    public function getBookedClasses(){
        $current_time = Carbon\Carbon::now('Asia/Manila');

        $today = Date($current_time);

        $classes = ClassPeriod::where('teacher' , $this->id )
        ->where('status' , 'BOOKED')
        ->orderBy('start','ASC')
        ->get();

        return $classes;
    }

    public function rank(){
        return $this->hasOne('App\TeacherRanking', 'teacher_id');

    }

}
