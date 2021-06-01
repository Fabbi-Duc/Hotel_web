<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->truncate();
        DB::table('room_types')->insert(
            [
                'name'=>'vip single rooms',
                'cost_first_hour'=>'2000000',
                'cost_next_hour'=>'1500000',
            ]
        ) ;
            
        DB::table('room_types')->insert([
            'name'=>'normal double rooms',
            'cost_first_hour'=>'1000000',
            'cost_next_hour'=>'700000',
        ]); 

        DB::table('room_types')->insert([
            'name'=>'normal single rooms',
            'cost_first_hour'=>'700000',
            'cost_next_hour'=>'500000',
        ]); 

        DB::table('room_types')->insert([
            'name'=>'vip double rooms',
            'cost_first_hour'=>'2500000',
            'cost_next_hour'=>'200000',
        ]); 
            
    }
}
