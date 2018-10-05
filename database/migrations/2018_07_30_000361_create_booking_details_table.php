<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');

            $table->unsignedInteger('row_id')->comment('The object model that is being booked.');
            $table->foreign('row_id')->references('id')->on('rows');

            $table->integer('adult_quantity');

            $table->unsignedInteger('form_data_id')->nullable()->default(null)->comment('The form data for this object model booked');
            $table->foreign('form_data_id')->references('id')->on('form_data');

            $table->double('iva_item', 12, 2);
            $table->double('total_item', 12, 2);

            $table->unsignedInteger('payment_method_id')->nullable()->default(null);
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

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
        Schema::dropIfExists('booking_details');
    }
}
