<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->unsignedBigInteger('id_kategori');
            $table->string('judul_kelas');
            $table->text('deskripsi');
            $table->string('instruktur');
            $table->decimal('harga', 12, 2)->default(0);
            $table->string('gambar')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();

            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};