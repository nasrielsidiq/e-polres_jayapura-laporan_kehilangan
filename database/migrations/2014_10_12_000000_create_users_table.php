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
        Schema::create('users', function (Blueprint $table) {
       	     $table->id('id_user');
             $table->string('nama_lengkap', 150);
             $table->string('nik', 20)->nullable();
             $table->string('email')->unique();
             $table->string('no_hp', 20)->nullable();
             $table->string('password');
            //  $table->enum('role', ['pelapor', 'petugas', 'admin'])->default('pelapor');
             $table->text('alamat')->nullable();
             $table->enum('status', ['active', 'blocked'])->default('active');
             $table->timestamp('email_verified_at')->nullable();

             $table->rememberToken();
             $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
