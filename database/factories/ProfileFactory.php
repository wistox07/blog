<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            'last_name_mother' => $this->faker->lastName(),  // Este campo será obligatorio en cada uso
            'last_name_father' => $this->faker->lastName(),
            'birthdate' => $this->faker->date(),
        ];
    }

}
