<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone_number');
            $table->mediumText('address');
            $table->char('gender',1);
            $table->date('birth_date');
            $table->string('profession');
            $table->integer('department_id');
            $table->string('department_name');
            $table->mediumText('biography')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('status');
            $table->integer('user_id')->nullable();
            $table->integer('create_user_id')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
