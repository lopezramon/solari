<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->nullable()->default(null);

            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');

            // DATOS DE FECHA
            $table->dateTime('delivery_date')->nullable()->default(null);
            $table->dateTime('store_date')->nullable()->default(null);

            // DATOS DEL USUARIO QUE REALIZA LA ORDEN
            $table->text('form_email')->nullable()->default(null);
            $table->text('form_name')->nullable()->default(null);
            $table->text('form_lastname')->nullable()->default(null);
            $table->text('form_phone')->nullable()->default(null);
            $table->text('form_state')->nullable()->default(null);
            $table->text('form_city')->nullable()->default(null);
            $table->text('form_address')->nullable()->default(null);
            $table->text('form_zip')->nullable()->default(null);
            $table->text('form_fiscal_code',20)->nullable()->default(null);
            $table->text('form_lat')->nullable()->default(null);
            $table->text('form_lng')->nullable()->default(null);

            // DATOS DE FACTURACION
            $table->text('invoice_email')->nullable()->default(null);
            $table->text('invoice_name')->nullable()->default(null);
            $table->text('invoice_lastname')->nullable()->default(null);
            $table->text('invoice_phone')->nullable()->default(null);
            $table->text('invoice_state')->nullable()->default(null);
            $table->text('invoice_city')->nullable()->default(null);
            $table->text('invoice_address')->nullable()->default(null);
            $table->text('invoice_zip')->nullable()->default(null);
            $table->text('invoice_fiscal_code')->nullable()->default(null);
            $table->text('invoice_sede_fiscal')->nullable()->default(null);

            // DATOS DE LA ORDEN
            $table->double('subtotal', 12, 2)->nullable()->default(null);
            $table->double('iva', 12, 2)->nullable()->default(null);
            $table->double('total', 12, 2);
            $table->text('comment')->nullable()->default(null);

            // BOOLEAN PARA EL FRONT-END
            $table->smallInteger('show_to_user')->nullable()->default(1)->comment('1:Show, 0:Hide.');

            $table->unsignedInteger('status_id')->default(4);
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
        Schema::dropIfExists('orders');
    }
}
