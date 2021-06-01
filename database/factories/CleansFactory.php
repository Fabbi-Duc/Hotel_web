<?php

namespace Database\Factories;

use App\Models\Cleans;
use Illuminate\Database\Eloquent\Factories\Factory;

class CleansFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cleans::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Pho',
            'cost' => '10000',
            'img_url' => 'https://image.shutterstock.com/image-photo/poster-above-white-cabinet-plant-260nw-1173139144.jpg',
        ];
    }
}
