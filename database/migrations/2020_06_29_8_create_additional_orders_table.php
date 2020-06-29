<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('additional_id')->unsigned();
            $table->dateTime("start_time", 5)->nullable(true);
            $table->dateTime("end_time", 5)->nullable(true);
            $table->bigInteger("order_id")->unsigned();

            $table->foreign('additional_id')->references('id')->on('additionals');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_orders');
    }
}
