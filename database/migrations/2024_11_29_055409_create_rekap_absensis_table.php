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
        Schema::create('rekap_absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('mapping_siswa_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->string('laporan')->nullable();
            $table->string('kendala')->nullable();
            $table->string('saran')->nullable();
            $table->string('fee_transfer')->nullable();
            $table->string('jadwal_terlaksana')->nullable();
            $table->string('total_sesi')->nullable();
            $table->string('tambahan_jam_ajar')->nullable();
            $table->text('file')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_absensis');
    }
};
