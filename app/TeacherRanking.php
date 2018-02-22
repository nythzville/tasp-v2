<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherRanking extends Model
{
    //
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers_rank';

    public function getTeacher(){
    	return $this->belongsTo('App\Teacher', 'teacher_id');
    }
}
