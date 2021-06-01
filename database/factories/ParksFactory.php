<?php

namespace Database\Factories;

use App\Models\Parks;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => random_int(1,10),
            'floor' => random_int(1,3),
            'type' => random_int(1,2),
            'status' => random_int(1,3),
        ];
    }
}
