<?php

namespace Database\Factories;

use App\Models\RoomsCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;


class RoomsCustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomsCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => random_int(1,10),
            'customer_id' => random_int(1,10),
            'start_time' => '2021-04-29T10:24',
            'end_time' => '2021-05-01T10:24',
            'status' => random_int(1,3)
        ];
    }
}
