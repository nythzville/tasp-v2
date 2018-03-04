<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
	
use App\Teacher;

class Course extends Model
{
    //
    public function getTeacher()
    {
    	if(!empty($this->report) && ($this->report != '')){

	    	$report = json_decode($this->report);

	    	return Teacher::find($report->teacher);

    	}else{
    		return false;
    	}	
    }
}
