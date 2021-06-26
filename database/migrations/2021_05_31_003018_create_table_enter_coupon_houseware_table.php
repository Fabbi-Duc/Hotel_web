<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnterCouponHousewareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enter_coupon_houseware', function (Blueprint $table) {
            $table->id();
            $table->integer('cost');
            $table->string('description');
            $table->integer('status');
            $table->date('day');
            $table->string('discount');
            $table->integer('user_id');
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
        Schema::dropIfExists('enter_coupon_houseware');
    }
}
