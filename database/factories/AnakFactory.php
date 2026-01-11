<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_anak' => $this->faker->name(),
            'tempat_lhr' => $this->faker->city(),
            'tgl_lhr' => $this->faker->date('Y-m-d', 'now'),
            'bb_lhr' => $this->faker->numberBetween(10, 40),
            'tb_lhr' => $this->faker->numberBetween(100, 160),
            'jenis_kelamin' => $this->faker->randomElement(array ('Laki - Laki','Perempuan')),
            'anak_ke' => $this->faker->randomDigitNotNull(),
            'nik_anak' => $this->faker->nik(),
            'bpjs_anak' => $this->faker->randomNumber(NULL, false),
            'ortu_id' => mt_rand(1,3)
        ];
    }
}
