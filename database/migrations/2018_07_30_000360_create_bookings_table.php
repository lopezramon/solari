<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->nullable()->default(null);

            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');

            // DATOS DEL BOOKING
            $table->double('subtotal', 12, 2)->nullable()->default(null);
            $table->double('iva', 12, 2)->nullable()->default(null);
            $table->double('total', 12, 2)->nullable()->default(null);
            $table->text('comment')->nullable()->default(null);

            // DATOS DEL RESPONSABLE
            $table->unsignedInteger('data_form_id')->nullable()->default(null)->comment('The data of the person responsible for this all object models booked');
            $table->foreign('data_form_id')->references('id')->on('data_forms');

            // BOOLEAN PARA EL FRONT-END
            $table->smallInteger('show_to_user')->nullable()->default(1)->comment('1:Show, 0:Hide.');

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
        Schema::dropIfExists('bookings');
    }
}
