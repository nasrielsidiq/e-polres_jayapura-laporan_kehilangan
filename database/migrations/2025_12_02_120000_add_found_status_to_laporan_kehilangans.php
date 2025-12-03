<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            $table->enum('status', [
                'submitted',
                'verified', 
                'processing',
                'done',
                'rejected',
                'found'
            ])->default('submitted')->change();
        });
    }

    public function down(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            $table->enum('status', [
                'submitted',
                'verified',
                'processing', 
                'done',
                'rejected'
            ])->default('submitted')->change();
        });
    }
};