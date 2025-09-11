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
   Schema::create('game_screenshots', function (Blueprint $table) {
        $table->id();
        $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
        $table->string('screenshot_path');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_screenshots');
    }
};
