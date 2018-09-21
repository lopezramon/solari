<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeatureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feature_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_feature_id');
            $table->foreign('product_feature_id')->references('id')->on('product_features');

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
        Schema::dropIfExists('product_feature_translations');
    }
}
