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
        Schema::create('inovasi_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_inovasi');
            $table->string('nama_inisiator');
            $table->string('hp', length: 14);
            $table->string('ktp', length: 16);
            $table->string('bentuk');
            $table->string('tahapan');
            $table->string('jenis');
            $table->date('waktu_ujicoba');
            $table->date('waktu_penerapan');
            $table->text('rancang_bangun');
            $table->text('tujuan');
            $table->text('manfaat');
            $table->text('hasil');
            $table->string('penghargaan')->nullable();
            $table->year('tahun');

            // Indikator Inovasi
            $table->text('kemudahan_proses');
            $table->text('keterlibatan_aktor');
            $table->string('sosialisasi');
            $table->string('sosialisasi_upload');
            $table->string('kemanfaatan');
            $table->string('kemanfaatan_upload');
            $table->text('kualitas_video');
            // $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovasi_masyarakats');
    }
};
