<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('slug', 50)->nullable()->default(null);
            $table->string('description', 50)->nullable()->default(null);
            $table->integer('width')->default(1);
            $table->integer('height')->default(1);
            $table->double('size', 12, 2)->default(1);
            $table->string('path', 100)->default('storage/multimedia');
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
        Schema::dropIfExists('multimedias');
    }
}
