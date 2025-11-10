<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sppd; // ✅ gunakan model Sppd (sesuai nama class)

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Sppd::factory(10)->create();
    }
}
