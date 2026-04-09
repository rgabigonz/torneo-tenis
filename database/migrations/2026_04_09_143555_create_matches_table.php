<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id')->constrained()->cascadeOnDelete();

            $table->string('phase', 30)->default('regular');
            $table->unsignedInteger('round_order')->default(1);

            $table->foreignId('player1_id')->constrained('players')->restrictOnDelete();
            $table->foreignId('player2_id')->constrained('players')->restrictOnDelete();

            $table->dateTime('scheduled_at')->nullable();

            $table->foreignId('proposed_by_player_id')->nullable()->constrained('players')->nullOnDelete();
            $table->string('proposal_status', 30)->default('none');

            $table->string('status', 30)->default('pending');

            $table->foreignId('winner_player_id')->nullable()->constrained('players')->nullOnDelete();
            $table->foreignId('loser_player_id')->nullable()->constrained('players')->nullOnDelete();
            $table->foreignId('walkover_player_id')->nullable()->constrained('players')->nullOnDelete();

            $table->timestamps();

            $table->index(['tournament_id', 'phase', 'status']);
            $table->index('scheduled_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};