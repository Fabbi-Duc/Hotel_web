<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServiceCleanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_service_cleans', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('clean_id');
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');
            $table->integer('cost');
            $table->integer('status');
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
        Schema::dropIfExists('room_service_clean');
    }
}
