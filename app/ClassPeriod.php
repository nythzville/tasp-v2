<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class ClassPeriod extends Model
{
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    public function getTeacher(){
        return $this->belongsTo('App\Teacher', 'teacher');

    }

    public function getStudent(){
        return $this->belongsTo('App\Student', 'student');

    }
    public function getAuthor(){
        return $this->belongsTo('App\User', 'author');

    }
}
