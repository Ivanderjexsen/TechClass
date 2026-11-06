<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_kelas');
            $table->string('nama_pendaftar');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('status_pendaftaran')->default('pending');
            $table->timestamps();

            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas')
                ->cascadeOnDelete();

            $table->unique(['id_kelas', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};