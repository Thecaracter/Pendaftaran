<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lomba');
            $table->unsignedBigInteger('id_user'); // Menambahkan kolom id_user
            $table->string('nama_peserta');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('asal_sekolah');
            $table->string('nisn');
            $table->enum('status_pembayaran', ['1', '2'])->default('1');
            $table->dateTime('tanggal_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};