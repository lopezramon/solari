<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedInteger('product_presentation_product_id');
            $table->foreign('product_presentation_product_id', 'product_presentation_products_fk')->references('id')->on('product_presentations_products');

            $table->unsignedInteger('product_feature_id')->nullable()->default(null);
            $table->foreign('product_feature_id')->references('id')->on('product_features');

            $table->integer('product_quantity');
            $table->double('total_item', 12, 2);
            $table->double('iva_item', 12, 2);

            $table->string('type_cart', 20)->nullable()->default(null);

            $table->text('comment')->nullable()->default(null);

            // $table->unsignedInteger('belongs_to_order_detail_id')->nullable()->default(null)->comment('To determine if the product is a complement of another in the same order.');
            // $table->foreign('belongs_to_order_detail_id'/*, 'order_details_belongs_to_order_detail_id_fk'*/)->references('id')->on('order_details');

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
        Schema::dropIfExists('order_details');
    }
}
