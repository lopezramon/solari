<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockedRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locked_rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->dateTime('locked_at')->nullable()->default(null)->comment('To know if the room is locked, and what is its locked start datetime.');

            $table->date('checkin_date')->comment('Start date from which the room is locked.');
            $table->date('checkout_date')->comment('End date until which the room is locked.');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locked_rooms');
    }
}
