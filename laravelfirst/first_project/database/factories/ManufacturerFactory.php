<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Manufacturer::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
