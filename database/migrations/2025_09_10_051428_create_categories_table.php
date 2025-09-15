<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID kategori
            $table->string('name')->unique(); // Nama genre/kategori
            $table->timestamps();
        });

        // Opsional: tambah data default
        DB::table('categories')->insert([
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Card Game'],
            ['name' => 'Educational'],
            ['name' => 'Fighting'],
            ['name' => 'Platformer'],
            ['name' => 'Puzzle'],
            ['name' => 'Racing'],
            ['name' => 'Rhythm'],
            ['name' => 'Role Playing'],
            ['name' => 'Shooter'],
            ['name' => 'Simulation'],
            ['name' => 'Sports'],
            ['name' => 'Strategy'],
            ['name' => 'Survival'],
            ['name' => 'Other'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
