<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisImunisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_imun' => $this->faker->randomElement(array ('Hepatitis B','BCG','PCV'))
        ];
    }
}
