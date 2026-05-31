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
        Schema::table('pendapatans', function (Blueprint $table) {
            $table->integer('standar_sesi_menit')->nullable()->default(90);
            $table->integer('toleransi_menit')->nullable()->default(15);
            $table->integer('fee_per_sesi')->nullable()->default(0);
            $table->integer('fee_rifaya_per_sesi')->nullable()->default(25000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendapatans', function (Blueprint $table) {
            $table->dropColumn(['standar_sesi_menit', 'toleransi_menit', 'fee_per_sesi', 'fee_rifaya_per_sesi']);
        });
    }
};
