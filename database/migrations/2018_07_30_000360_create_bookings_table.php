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

            $table->date('checkin_date');
            $table->date('checkout_date');

            // DATOS DEL BOOKING
            $table->double('subtotal', 12, 2)->nullable()->default(null);
            $table->double('iva', 12, 2)->nullable()->default(null);
            $table->double('total', 12, 2)->nullable()->default(null);
            $table->text('comment')->nullable()->default(null);

            // DATOS DEL RESPONSABLE
            $table->text('responsable_name')->nullable()->default(null);
            $table->text('responsable_email')->nullable()->default(null);
            $table->text('responsable_phone')->nullable()->default(null);
            $table->text('responsable_identification')->nullable()->default(null);

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
