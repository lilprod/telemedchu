<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone_number');
            $table->mediumText('address');
            $table->char('gender',1);
            $table->date('birth_date');
            $table->string('place_birth')->nullable();
            $table->integer('age');
            $table->string('marital_status');
            $table->string('nationality');
            $table->string('ethnic_group')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('rhesus')->nullable();
            $table->string('profession');
            $table->string('profile_picture')->nullable();
            $table->integer('status');
            $table->integer('biometry_id')->nullable();
            $table->integer('antecedent_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_firstname')->nullable();
            $table->string('doctor_email')->nullable();
            $table->string('doctor_phone')->nullable();
            $table->mediumText('doctor_address')->nullable();
            $table->char('doctor_gender',1)->nullable();
            $table->string('doctor_profession')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('department_name')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('create_user_id')->nullable();
            $table->string('doctor_user_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
