<?php

namespace Database\Factories;


use App\Models\ColorKey;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorKeyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */    protected $model = ColorKey::class;
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
