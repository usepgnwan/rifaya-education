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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_telp', 255);
            $table->date('tanggal_lahir');
            $table->text('quote')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->string('kendaraan',255)->nullable();
            $table->text('perangkat_ajar')->nullable();
            $table->text('cv')->nullable();
            $table->text('metode_mengajar')->nullable();
            $table->boolean('sim')->nullable();
            $table->string('deskripsi_sim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};