<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standing extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'player_id',
        'played',
        'won',
        'lost',
        'walkovers_won',
        'walkovers_lost',
        'points',
        'games_for',
        'games_against',
        'games_diff',
        'ranking_position',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}