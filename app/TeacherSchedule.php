<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    //
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers_schedule';

    // public function getAvailableTeacher($from, $to){
    	
    // 	return $this->belongsTo('App\Teacher', 'employee_id')->where('start', '<=', $from)->where('end', '>=', $to)->get();
    // }


    public function teacher(){
    	return $this->belongsTo('App\Teacher', 'teacher_id');
    }
}
