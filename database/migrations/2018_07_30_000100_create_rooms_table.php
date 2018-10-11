<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('slug');

            $table->text('image')->nullable()->default(null);

            $table->unsignedInteger('room_category_id');
            $table->foreign('room_category_id')->references('id')->on('room_categories');

            $table->unsignedInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->dateTime('locked_at')->nullable()->default(null)->comment('To know if the room is locked, and what is its locked start datetime.');

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
        Schema::dropIfExists('rooms');
    }
}
