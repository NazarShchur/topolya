<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string("contact_number");
            $table->string("contact_name");
            $table->bigInteger('pavilion_id')->unsigned();
            $table->integer('people_count');
            $table->boolean("is_closed");
            $table->date("date");
            $table->double('payed')->default(0);

            $table->foreign("pavilion_id")->references("id")->on("pavilions");
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
