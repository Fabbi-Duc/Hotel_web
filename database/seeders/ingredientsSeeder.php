<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ingredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->truncate();
        DB::table('ingredients')->insert(
            [
                'name' => 'thit bo',
                'quantity' => '100',
                'cost' => '25000',
                'unit' => 'kg'
            ]
        );

        DB::table('ingredients')->insert([
            'name' => 'thit ga',
            'quantity' => '100',
            'cost' => '10000',
            'unit' => 'kg'
        ]);

        DB::table('ingredients')->insert([
            'name' => 'thit lon',
            'quantity' => '100',
            'cost' => '15000',
            'unit' => 'kg'
        ]);

        DB::table('ingredients')->insert([
            'name' => 'coca',
            'quantity' => '100',
            'cost' => '100000',
            'unit' => 'thung'
        ]);
    }
}
