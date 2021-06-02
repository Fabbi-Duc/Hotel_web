<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('customer_id');
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');
            $table->integer('status');
            $table->integer('money');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_customer');
    }
}
