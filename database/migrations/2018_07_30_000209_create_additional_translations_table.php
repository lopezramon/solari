<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('additional_id');
            $table->foreign('additional_id')->references('id')->on('additionals');

            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->string('name', 50);
            $table->string('description', 500);

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
        Schema::dropIfExists('additional_translations');
    }
}
