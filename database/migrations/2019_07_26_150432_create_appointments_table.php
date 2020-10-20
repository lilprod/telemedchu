<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone_number');
            $table->date('date_apt');
            $table->time('begin_time');
            $table->time('end_time'); 
            $table->integer('department_id');
            $table->string('department_name');
            $table->integer('doctor_id');
            $table->integer('doctorUser_id');
            $table->string('doctor_name');
            $table->string('doctor_firstname');
            $table->string('doctor_email');
            $table->string('doctor_phone');
            $table->mediumText('doctor_address');
            $table->string('doctor_profession')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('appointments');
    }
}
