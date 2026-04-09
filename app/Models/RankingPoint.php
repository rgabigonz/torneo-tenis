<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RankingPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_id',
        'player_id',
        'tournament_id',
        'source_type',
        'source_id',
        'points',
        'notes',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}