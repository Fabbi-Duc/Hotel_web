<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => random_int(303, 305),
            'room_type_id' => random_int(1,4),
            'status' => random_int(1,3),
            'image_url' => 'https://image.shutterstock.com/image-photo/poster-above-white-cabinet-plant-260nw-1173139144.jpg',
            'code_room' => 'nguyenduc05021998@gmail.com',
            'decription' => 'helle everybody',
            'floor' => random_int(1,2),
        ];
    }
}
