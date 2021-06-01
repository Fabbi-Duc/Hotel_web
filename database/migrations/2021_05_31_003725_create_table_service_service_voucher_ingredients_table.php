<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServiceServiceVoucherIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_voucher_coupon_ingredients', function (Blueprint $table) {
            $table->id();
            $table->integer('enter_coupon_ingredients_id');
            $table->integer('ingredients_id');
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
        Schema::dropIfExists('service_voucher_coupon_ingredients');
    }
}
