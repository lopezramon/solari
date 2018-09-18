<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details_additionals', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_detail_id');
            $table->foreign('order_detail_id')->references('id')->on('order_details');

            $table->unsignedInteger('additional_id');
            $table->foreign('additional_id')->references('id')->on('additionals');

            $table->integer('additional_quantity');
            $table->double('total_item', 12, 2);
            $table->double('iva_item', 12, 2);

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
        Schema::dropIfExists('order_detail_additionals');
    }
}
