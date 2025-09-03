<?php

// database/migrations/2025_09_01_000002_create_developers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('developer_name');
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void {
        Schema::dropIfExists('developers');
    }
};
