<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_ba')->unique();
            $table->foreignId('id_laporan')->constrained('laporan_kehilangans', 'id_laporan')->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users', 'id_user')->cascadeOnDelete();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};