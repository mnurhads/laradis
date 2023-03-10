<?php

namespace Database\Factories;

use App\Models\AnggotaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AnggotaModel::class;

    public function definition()
    {
        return [
            'nm_anggota' => $this->faker->name(),
            'tmp_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date($format='Y-m-d', $max='now'),
            'alamat'    => $this->faker->address(),
            'no_hp'     => $this->faker->phoneNumber()
        ];
    }
}
