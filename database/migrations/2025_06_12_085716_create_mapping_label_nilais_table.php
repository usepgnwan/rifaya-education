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
        Schema::create('mapping_label_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mapping_sekolah_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained("mata_pelajarans")->onDelete('cascade');
            $table->text('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapping_label_nilais');
    }
};
