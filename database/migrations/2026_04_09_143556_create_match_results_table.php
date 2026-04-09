<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('match_id')->constrained('matches')->cascadeOnDelete();

            $table->unsignedSmallInteger('set_games_p1');
            $table->unsignedSmallInteger('set_games_p2');

            $table->boolean('has_super_tiebreak')->default(false);
            $table->unsignedSmallInteger('super_tiebreak_p1')->nullable();
            $table->unsignedSmallInteger('super_tiebreak_p2')->nullable();

            $table->foreignId('entered_by_player_id')->constrained('players')->restrictOnDelete();
            $table->foreignId('confirmed_by_player_id')->nullable()->constrained('players')->nullOnDelete();
            $table->foreignId('admin_validated_by_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('validation_status', 30)->default('pending');
            $table->text('comments')->nullable();

            $table->timestamps();

            $table->unique('match_id');
            $table->index('validation_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_results');
    }
};