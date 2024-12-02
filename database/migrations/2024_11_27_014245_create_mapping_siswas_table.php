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
        Schema::create('mapping_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('matapelajaran_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->integer('perkiraan_sesi')->nullable();
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapping_siswas');
    }
};
