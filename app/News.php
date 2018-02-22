<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   	//
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';
}
