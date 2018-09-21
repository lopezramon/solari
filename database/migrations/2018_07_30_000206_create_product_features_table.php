<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->nullable()->default(null);
            $table->double('price', 12, 2)->nullable()->default(null);
            $table->double('iva', 12, 2)->nullable()->default(null);

            $table->unsignedInteger('product_feature_category_id')->default(1);
            $table->foreign('product_feature_category_id')->references('id')->on('product_feature_categories');

            $table->unsignedInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');

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
        Schema::dropIfExists('product_features');
    }
}
