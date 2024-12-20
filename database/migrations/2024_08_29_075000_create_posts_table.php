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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255);
            $table->text('body');
            $table->text('image')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->enum('status', ['draft', 'published','reject'])->default('draft');
            $table->enum('type', ['public', 'private', 'purchase'])->default('public');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
