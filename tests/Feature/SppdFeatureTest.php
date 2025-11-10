<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Sppd;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SppdFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_data()
    {
        Sppd::factory()->count(3)->create();

        $response = $this->get('/api/sppds');

        $response->assertStatus(200);
    }

    public function test_store_data()
    {
        $data = [
            'nama_pegawai'    => 'Buzz',
            'no_trip'         => 'TRIP/005/PLN/2006',
            'lokasi_dinas'    => 'UPT Madiun',
            'tanggal_mulai'   => '2025-07-21',
            'tanggal_selesai' => '2025-07-22',
            'status'          => 'Diajukan',
        ];

        $response = $this->post('/api/sppds', $data);

        // kalau controllernya return 201 → biarkan
        // kalau return 200 → ubah ke 200
        $response->assertStatus(201);

        $this->assertDatabaseHas('sppd4', $data);
    }

    public function test_show_data()
    {
        $sppd = Sppd::factory()->create();

        $response = $this->get("/api/sppds/{$sppd->id}");

        $response->assertStatus(200);
    }

    public function test_update_data()
    {
        $sppd = Sppd::factory()->create();

        $updated = [
            'nama_pegawai'    => 'MoVe',
            'no_trip'         => 'TRIP/005/PLN/2006',
            'lokasi_dinas'    => 'UP3 Madiun',
            'tanggal_mulai'   => '2025-07-23',
            'tanggal_selesai' => '2025-07-24',
            'status'          => 'Disetujui',
        ];

        $response = $this->put("/api/sppds/{$sppd->id}", $updated);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sppd4', $updated);
    }

    public function test_destroy_data()
    {
        $sppd = Sppd::factory()->create();

        $response = $this->delete("/api/sppds/{$sppd->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('sppd4', ['id' => $sppd->id]);
    }
}
