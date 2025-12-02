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
        Schema::create('riwayat_proses', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->foreignId('id_laporan')->constrained('laporan_kehilangans', 'id_laporan')->cascadeOnDelete();
            $table->foreignId('id_petugas')->nullable()->constrained('users', 'id_user')->cascadeOnDelete();
            $table->string('status', 30);
            $table->text('catatan')->nullable();
            $table->dateTime('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_proses');
    }
};
