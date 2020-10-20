<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescribedDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescribed_drugs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prescription_id');
            $table->string('patient_id');
            $table->string('doctor_id');
            $table->string('medication_id');
            $table->string('medication_name');
            $table->string('medecine_family')->nullable();
            $table->string('form')->nullable();
            $table->string('dosage')->nullable();
            $table->mediumText('presentation')->nullable();
            $table->mediumText('observation')->nullable();
            $table->mediumText('prescription')->nullable();
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
        Schema::dropIfExists('prescribed_drugs');
    }
}
