<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('examination_picture');
            $table->integer('examination_id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('prescription_id');
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
        Schema::dropIfExists('exam_images');
    }
}
