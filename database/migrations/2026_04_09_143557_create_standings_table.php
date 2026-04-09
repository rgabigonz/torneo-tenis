<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();

            $table->unsignedInteger('played')->default(0);
            $table->unsignedInteger('won')->default(0);
            $table->unsignedInteger('lost')->default(0);
            $table->unsignedInteger('walkovers_won')->default(0);
            $table->unsignedInteger('walkovers_lost')->default(0);

            $table->integer('points')->default(0);
            $table->integer('games_for')->default(0);
            $table->integer('games_against')->default(0);
            $table->integer('games_diff')->default(0);
            $table->unsignedInteger('ranking_position')->nullable();

            $table->timestamps();

            $table->unique(['tournament_id', 'player_id']);
            $table->index(['tournament_id', 'ranking_position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};