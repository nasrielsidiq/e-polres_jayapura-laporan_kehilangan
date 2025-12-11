<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            $table->integer('submission_count')->default(1)->after('selesai_at');
        });
    }

    public function down(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            $table->dropColumn('submission_count');
        });
    }
};