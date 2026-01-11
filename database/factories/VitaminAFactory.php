<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VitaminAFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'anak_id' => mt_rand(1,8),
            'tgl' => $this->faker->date('Y-m-d', 'now'),
            'keterangan' => $this->faker->text(50)
        ];
    }
}
