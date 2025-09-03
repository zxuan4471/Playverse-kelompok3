<?php

// database/migrations/2025_09_01_000005_create_games_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('developer_id')->constrained('developers')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('version')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void {
        Schema::dropIfExists('games');
    }
};

