<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('medical_history')->nullable();
            $table->mediumText('father_history')->nullable();
            $table->mediumText('mother_history')->nullable();
            $table->mediumText('collateral_history')->nullable();
            $table->mediumText('partener_history')->nullable();
            $table->mediumText('surgical_history')->nullable();
            $table->mediumText('obstetrical_history')->nullable();
            $table->mediumText('allergy')->nullable();
            $table->integer('patient_id');
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
        Schema::dropIfExists('antecedents');
    }
}
