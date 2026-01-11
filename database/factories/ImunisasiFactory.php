<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImunisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl_imun' => $this->faker->date('Y-m-d', 'now'),
            'booster' => $this->faker->randomElement(array ('Ya','Tidak')),
            'ket_imun' => $this->faker->text(50),
            'jenisimunisasi_id' => mt_rand(1,3),
            'anak_id' => mt_rand(1,8)
        ];
    }
}
