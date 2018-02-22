<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('agent_id');
            $table->string('student_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('gender');
            $table->date('dob');
            $table->string('skype')->nullable();
            $table->string('qq')->nullable();
            $table->integer('available_class')->default(0);
            $table->string('status')->default('TEMP');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
