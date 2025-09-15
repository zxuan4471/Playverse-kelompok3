<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('classification_id')->after('platform_id');

            $table->foreign('classification_id')
                  ->references('id')
                  ->on('classifications')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['classification_id']);
            $table->dropColumn('classification_id');
        });
    }
};
