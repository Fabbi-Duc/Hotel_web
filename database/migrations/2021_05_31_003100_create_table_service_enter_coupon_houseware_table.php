<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServiceEnterCouponHousewareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_enter_coupon_houseware', function (Blueprint $table) {
            $table->id();
            $table->integer('enter_coupon_houseware_id');
            $table->integer('houseware_id');
            $table->integer('quantity');
            $table->integer('quantity_return');
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
        Schema::dropIfExists('service_enter_coupon_houseware');
    }
}
