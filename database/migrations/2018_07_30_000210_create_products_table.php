<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->nullable()->default(null);
            $table->string('slug', 50);

            $table->double('price', 8, 2)->nullable()->default(null);
            $table->float('iva', 5)->nullable()->default(null);
            $table->string('image', 250)->nullable()->default(null);
            $table->integer('max_additionals')->nullable()->default(null)->comment('Integer to indicate maximum of additionals for this product, if it is null or zero, it does not allow additional.');

            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedInteger('product_subcategory_id');
            $table->foreign('product_subcategory_id')->references('id')->on('product_subcategories');

            $table->unsignedInteger('additional_category_id')->nullable()->default(null);
            $table->foreign('additional_category_id')->references('id')->on('additional_categories');

            $table->unsignedInteger('product_feature_category_id')->nullable()->default(null);
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
        Schema::dropIfExists('products');
    }
}
