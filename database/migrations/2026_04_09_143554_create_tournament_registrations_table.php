<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tournament_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('seed_number')->nullable();
            $table->string('status', 30)->default('registered');
            $table->timestamps();

            $table->unique(['tournament_id', 'player_id']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournament_registrations');
    }
};