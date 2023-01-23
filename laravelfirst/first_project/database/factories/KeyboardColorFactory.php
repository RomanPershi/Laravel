<?php

namespace Database\Factories;

use App\Models\KeyboardColor;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeyboardColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = KeyboardColor::class;
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
