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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('mapping_siswa_id')->constrained()->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->integer('jam_ajar')->nullable();
            $table->string('sistem_mengajar')->nullable();
            $table->string('tambahan_jam_ajar')->nullable();
            $table->text('foto')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
