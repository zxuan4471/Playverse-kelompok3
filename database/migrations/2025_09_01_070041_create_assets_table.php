<?php

// database/migrations/2025_09_01_000006_create_assets_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('file_url');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void {
        Schema::dropIfExists('assets');
    }
};
