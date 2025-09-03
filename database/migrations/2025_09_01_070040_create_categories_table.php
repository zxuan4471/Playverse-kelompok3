<?php

// database/migrations/2025_09_01_000004_create_categories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void {
        Schema::dropIfExists('categories');
    }
};
