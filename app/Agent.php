<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Student;

class Agent extends Model
{
    //
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agents';

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
    public function getTotalStudents(){
    
        return Student::where('agent_id', $this->id)->count();
    }
    public function getTotalCompletedClasses($date_from = null, $date_to = null){

        $students = Student::where('agent_id', $this->id)->get();
        $totalClasses = 0;
        foreach ($students as $student) {
            $totalClasses += $student->getTotalCompletedClasses($date_from, $date_to);
        }
        return $totalClasses;
    }

    public function getTotalAvailableClasses(){
    
        $students = Student::where('agent_id', $this->id)->get();
        $totalClasses = 0;

        foreach ($students as $student) {
            $availableClass = $student->available_class;
            $totalClasses += $availableClass;
        }

        return $totalClasses;
    }
}
