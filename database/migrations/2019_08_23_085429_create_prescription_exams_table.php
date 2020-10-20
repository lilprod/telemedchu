<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->string('type_title');
            $table->date('date');
            $table->mediumText('prescription')->nullable();
            $table->integer('consultation_id');
            $table->string('consultation_reason');
            $table->string('consultation_height')->nullable();
            $table->string('consultation_weight')->nullable();
            $table->string('consultation_pulse')->nullable();
            $table->string('consultation_blood_pressure')->nullable();
            $table->mediumText('diagnostic')->nullable();
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
            $table->integer('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_firstname');
            $table->string('doctor_email');
            $table->string('doctor_phone');
            $table->mediumText('doctor_address');
            $table->integer('user_id');
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
        Schema::dropIfExists('prescription_exams');
    }
}
