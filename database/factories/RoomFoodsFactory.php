<?php

namespace Database\Factories;

use App\Models\RoomFoods;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFoodsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomFoods::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_service_food_id' => random_int(1,10),
            "food_id" => random_int(1,10),
            "count" => random_int(1,4),
            "status" => random_int(1,3),
        ];
    }
}
