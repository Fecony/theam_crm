<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition(): array
    {
        $image = $this->faker->image(public_path('storage/photos/testing'), 400, 300, null, false);

        return [
            'name' => $image,
            'path' => "photos/testing/" . $image,
        ];
    }
}
