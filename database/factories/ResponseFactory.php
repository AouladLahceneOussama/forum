<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id' => rand(1,10),
            'response' => $this->faker->text(40),
            'name' => $this->faker->firstName(),
            'email' => $this->faker->safeEmail(),
            'pseudo' => $this->faker->lastName(),
        ];
    }
}
