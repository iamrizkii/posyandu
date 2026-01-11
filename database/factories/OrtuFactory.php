<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrtuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_ibu' => $this->faker->name('female'),
            'nama_ayah' => $this->faker->name('male'),
            'tempat_lhr' => $this->faker->city(),
            'tgl_lhr' => $this->faker->date('Y-m-d', 'now'),
            'alamat' => $this->faker->address(),
            'agama' => $this->faker->randomElement(array ('Islam','Kristen','Hindu','Buddha')),
            'nik' => $this->faker->nik(),
            'kk' => $this->faker->randomNumber(NULL, false),
            'nohp' => $this->faker->phoneNumber()
        ];
    }
}
