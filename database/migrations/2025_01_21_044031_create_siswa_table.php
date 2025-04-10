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
        Schema::create('siswa', function (Blueprint $table) {        
          $table->id();
          $table->integer('no_daftar');
          $table->integer('nisn')->unique();
          $table->integer('nik')->unique();
          $table->string('nama');
          $table->string('asal');
          $table->string('agama');
          $table->integer('no_kk')->unique();
          $table->string('ttl');
          $table->string('alamat');
          $table->string('pas_foto');
          $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
