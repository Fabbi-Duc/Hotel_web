<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->truncate();
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-01-01T10:24',
            'end_time' => '2021-01-02T10:24',
            'price' => '30000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 33,
            'start_time' => '2021-02-01T10:24',
            'end_time' => '2021-02-02T10:24',
            'price' => '40000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 3,
            'start_time' => '2021-03-01T10:24',
            'end_time' => '2021-03-02T10:24',
            'price' => '40000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-04-01T10:24',
            'end_time' => '2021-04-02T10:24',
            'price' => '20000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-05-01T10:24',
            'end_time' => '2021-05-02T10:24',
            'price' => '30000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-06-01T10:24',
            'end_time' => '2021-06-02T10:24',
            'price' => '60000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-07-01T10:24',
            'end_time' => '2021-07-02T10:24',
            'price' => '35000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-08-01T10:24',
            'end_time' => '2021-08-02T10:24',
            'price' => '30000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-09-01T10:24',
            'end_time' => '2021-09-02T10:24',
            'price' => '38000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-10-01T10:24',
            'end_time' => '2021-10-02T10:24',
            'price' => '70000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-11-01T10:24',
            'end_time' => '2021-11-02T10:24',
            'price' => '65000000',
            'status' => 3,
        ]);
        DB::table('bills')->insert([
            'room_id' => 1,
            'start_time' => '2021-12-01T10:24',
            'end_time' => '2021-12-02T10:24',
            'price' => '37000000',
            'status' => 3,
        ]);

    }
}
