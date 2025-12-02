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
        Schema::create('laporan_kehilangans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('nomor_laporan', 50)->unique();
            $table->foreignId('id_user')->constrained('users', 'id_user')->cascadeOnDelete();
            $table->dateTime('tanggal_lapor');
            // $table->string('kategori_barang', 50);
            $table->foreignId('id_kategori_barang')->constrained('kategori_barangs', 'id_kategori')->cascadeOnDelete();
            $table->string('nama_barang', 150);
            $table->text('deskripsi_barang')->nullable();
            $table->string('lokasi_kehilangan', 255);
            $table->dateTime('waktu_kehilangan')->nullable();
            $table->text('kronologi')->nullable();
            $table->enum('status', [
                'submitted',
                'verified',
                'processing',
                'done',
                'rejected'
            ])->default('submitted');
            $table->foreignId('verified_by')->nullable()->constrained('users', 'id_user')->nullOnDelete();
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('selesai_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kehilangans');
    }
};
