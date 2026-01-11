<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuTamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_tamu' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'jabatan' => $this->faker->jobTitle(),
            'keperluan' => $this->faker->text(50)
        ];
    }
}
