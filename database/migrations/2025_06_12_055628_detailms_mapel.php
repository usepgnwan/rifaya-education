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
        Schema::create('detailms_mapel', function (Blueprint $table) {
            $table->foreignId('mapping_sekolah_id')->constrained("mapping_sekolahs")->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained("mata_pelajarans")->onDelete('cascade');
            $table->primary(['mapping_sekolah_id', 'mata_pelajaran_id']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('detailms_mapel');
    }
};
