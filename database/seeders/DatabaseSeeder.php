<?php

namespace Database\Seeders;

use App\Models\RoomServiceClean;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MailTemplateSeeder::class,
            RoomSeeder::class,
            RoomTypesSeeder::class,
            CustomerSeeder::class,
            FoodsSeeder::class,
            BillsSeeder::class,
            ParksSeeder::class,
            RoomsCustomerSeeder::class,
            RoomServiceFoodSeeder::class,
            RoomServiceParkSeeder::class,
            RoomServiceCleanSeeder::class,
            RoomFoodsSeeder::class,
            housewareSeeder::class,
            ingredientsSeeder::class,
        ]);
    }
}
