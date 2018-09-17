<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPresentationsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_presentations_products', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_presentation_id');
            $table->foreign('product_presentation_id')->references('id')->on('product_presentations');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->string('slug', 50)->nullable()->default(null);

            $table->double('price', 8, 2);
            $table->float('iva', 5)->nullable()->default(null);
            $table->integer('delivery')->smallInteger()->nullable()->default(null)->comment('Boolean to indicate if the presentation of this product is for delivery.');
            $table->integer('suggestion')->smallInteger()->nullable()->default(null)->comment('Boolean to indicate if the presentation of this product will appear in suggestion.');

            $table->integer('product_quantity')->nullable()->default(null);
            $table->integer('min_quantity_of_sale')->nullable()->default(null);
            $table->integer('max_quantity_of_sale')->nullable()->default(null);
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
        Schema::dropIfExists('product_presentations_products');
    }
}
