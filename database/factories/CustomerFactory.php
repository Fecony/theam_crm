<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName,
            'photo_id' => $this->faker->boolean(50) ? Photo::inRandomOrder()->first() : null
        ];
    }
}
