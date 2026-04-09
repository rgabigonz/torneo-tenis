<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ranking_points', function (Blueprint $table) {
            $table->id();

            $table->foreignId('season_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tournament_id')->nullable()->constrained()->nullOnDelete();

            $table->string('source_type', 30);
            $table->unsignedBigInteger('source_id')->nullable();

            $table->integer('points');
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index(['season_id', 'player_id']);
            $table->index('source_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ranking_points');
    }
};