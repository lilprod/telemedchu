<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            /* $table->integer('user_id')->unsigned();
            $table->text('message'); */
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->text('message');
            $table->integer('status');
            $table->string('file');
            $table->string('type');
            $table->float('filesize');
            $table->text('path');
            $table->integer('typing_sender');
            $table->integer('typing_receiver');
            $table->timestamps();

            /* $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
