<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable()->default(null);
            $table->string('themes')->nullable()->default(null);
            $table->boolean('viaEmail')->nullable()->default(null);
            $table->boolean('viaSms')->nullable()->default(null);
            $table->string('fiscal_code',20)->nullable()->default(null);
            $table->string('empresa')->nullable()->default(null);
            $table->string('num_civic')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('province')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->boolean('terms')->nullable()->default(null);

            $table->unsignedInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('user_details');
    }
}
