<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUpdateTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_timesheet', function (Blueprint $table) {
            $table->id();
            $table->integer('time_sheet_id');
            $table->dateTime('start_time_update');
            $table->dateTime('end_time_update');
            $table->string('description');
            $table->integer('status_update');
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
        Schema::dropIfExists('update_timesheet');
    }
}
