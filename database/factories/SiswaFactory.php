<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guru;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enum = ['L', 'P',];
        $guru = Guru::pluck('id')->toArray();
        return [
            'name' => fake()->name(),
            'id_guru' => $this->faker->randomElement($guru),
            'jk' => $this->faker->randomElement($enum),
            'notelp' => $this->faker->regexify('[0-9]{12}'),
        ];
    }
}
