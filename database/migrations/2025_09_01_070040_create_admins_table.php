<?php

// database/migrations/2025_09_01_000003_create_admins_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('role', ['admin_biasa', 'admin_super']);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void {
        Schema::dropIfExists('admins');
    }
};
