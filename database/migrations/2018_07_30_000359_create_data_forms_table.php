<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_forms', function (Blueprint $table) {
            $table->increments('id');

            $table->text('name')->nullable()->default(null);
            $table->text('lastname')->nullable()->default(null);
            $table->text('email')->nullable()->default(null);
            $table->text('phone')->nullable()->default(null);
            $table->text('fiscal_code')->nullable()->default(null);

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
        Schema::dropIfExists('data_forms');
    }
}
