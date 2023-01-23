<?php

namespace Database\Factories;

use App\Models\TypeKeyboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeKeyboardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = TypeKeyboard::class;
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
