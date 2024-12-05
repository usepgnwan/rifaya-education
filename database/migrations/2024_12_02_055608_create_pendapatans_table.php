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
        Schema::create('pendapatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekap_absensi_id')->constrained()->onDelete('cascade');
            $table->string('user_affiliate_id')->nullable();
            $table->string('nominal_fee_rifaya')->nullable();
            $table->string('nominal_fee_tutor')->nullable();
            $table->string('nominal_affiliate')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->text('foto')->nullable();
            $table->text('foto_gross_income')->nullable();
            $table->text('foto_affiliate')->nullable();
            $table->enum('status', ['dibayarkan', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatans');
    }
};
