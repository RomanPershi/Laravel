<?php

namespace Database\Factories;

use App\Models\InterfaceConnect;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterfaceConnectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = InterfaceConnect::class;
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
