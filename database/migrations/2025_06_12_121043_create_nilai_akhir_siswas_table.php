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
        Schema::create('nilai_akhir_siswas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('mapping_label_nilai_id')->constrained("mapping_label_nilais")->onDelete('cascade');
            $table->foreignId('mapping_sekolah_id')->constrained("mapping_sekolahs")->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained("siswa")->onDelete('cascade');
            $table->text('nilai')->nullable();
            $table->string('type')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_akhir_siswas');
    }
};
