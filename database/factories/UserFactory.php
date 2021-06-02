<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->name,
            'firstname' => $this->faker->name,
            'phone' => '0833910940',
            'gender' => random_int(0,1),
            'position' => random_int(0,5),
            'email' => strtolower($this->faker->unique()->lastName) . "@gmail.com",
            'image_user' => 'https://image.shutterstock.com/image-photo/poster-above-white-cabinet-plant-260nw-1173139144.jpg',
            'email_verified_at' => now(),
            'password' => bcrypt(123456), // password
            'birthday' => '2021-04-29',
            'shift' => random_int(1,2),
            'salary' => 5000000,
            'remember_token' => Str::random(10),
        ];
    }
}
