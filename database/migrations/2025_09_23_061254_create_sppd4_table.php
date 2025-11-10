<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sppd4', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nama_pegawai', 100); // nama_pegawai VARCHAR(100) NOT NULL
            $table->string('no_trip', 100); // no_trip VARCHAR(100) NOT NULL
            $table->string('lokasi_dinas', 150)->nullable(); // lokasi_dinas VARCHAR(150)
            $table->date('tanggal_mulai')->nullable(); // tanggal_mulai DATE
            $table->date('tanggal_selesai')->nullable(); // tanggal_selesai DATE

            // status ENUM
            $table->enum('status', ['Diajukan', 'Disetujui','Menunggu','Selesai'])->default('Diajukan');

            $table->timestamp('created_at')->useCurrent(); // created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->nullable(); // optional for Laravel timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sppd4');
    }
};
