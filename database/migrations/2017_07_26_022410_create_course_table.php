<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('regular_classes_completed')->default(0);
            $table->integer('trial_class_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('report')->nullable();
            $table->string('status');
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
        Schema::drop('courses');
    }//
}
