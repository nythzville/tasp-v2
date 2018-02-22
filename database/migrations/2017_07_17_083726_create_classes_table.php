<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author');
            $table->integer('student');
            $table->integer('teacher');
            $table->string('topic')->nullable();
            $table->integer('course');
            $table->integer('note')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->text('evaluation')->nullable(); 
            $table->string('status');
            $table->string('type');
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
        Schema::drop('classes');
    }
}
