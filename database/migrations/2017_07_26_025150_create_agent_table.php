<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('agent_id')->nullable();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->string('skype')->nullable();
            $table->string('qq')->nullable();
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
        Schema::drop('agents');
        
    }
}
