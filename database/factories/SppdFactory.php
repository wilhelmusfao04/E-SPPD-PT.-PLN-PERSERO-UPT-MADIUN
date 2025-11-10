<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sppd>
 */
class SppdFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_pegawai' => $this->faker->name(),
            'no_trip' => $this->faker->unique()->numerify('TRIP-####'),
            'lokasi_dinas' => $this->faker->city(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'tanggal_selesai' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['Diajukan', 'Disetujui','Menunggu' ,'Selesai']),
        ];
    }
}
