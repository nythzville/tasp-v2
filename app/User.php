<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function getAdmin(){
    //     return $this->hasOne('App\Admin', 'user_id', 'id')->first();

    // }

    public function getStudent(){
        return $this->hasOne('App\Student', 'user_id', 'id')->first();

    }

    public function getTeacher(){
        return $this->hasOne('App\Teacher', 'user_id', 'id')->first();

    }
    public function getAgent(){
        return $this->hasOne('App\Agent', 'user_id', 'id')->first();

    }
}
