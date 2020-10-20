<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id');
            $table->string('patient_name');
            $table->string('patient_firstname');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->mediumText('patient_address');
            $table->char('gender',1);
            $table->date('birth_date');
            $table->integer('age');
            $table->string('patient_profession')->nullable();
            $table->string('reason');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->float('imc')->nullable();
            $table->string('pulse')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('temperature')->nullable();
            $table->mediumText('biological_indicator')->nullable();
            $table->mediumText('history')->nullable();
            $table->mediumText('physic_exam')->nullable();
            $table->mediumText('diagnostic')->nullable();
            $table->integer('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_firstname');
            $table->string('doctor_email');
            $table->string('doctor_phone');
            $table->mediumText('doctor_address');
            $table->string('doctor_profession')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('consultations');
    }
}
