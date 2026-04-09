<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchModel extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'tournament_id',
        'phase',
        'round_order',
        'player1_id',
        'player2_id',
        'scheduled_at',
        'proposed_by_player_id',
        'proposal_status',
        'status',
        'winner_player_id',
        'loser_player_id',
        'walkover_player_id',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function player1()
    {
        return $this->belongsTo(Player::class, 'player1_id');
    }

    public function player2()
    {
        return $this->belongsTo(Player::class, 'player2_id');
    }

    public function proposedByPlayer()
    {
        return $this->belongsTo(Player::class, 'proposed_by_player_id');
    }

    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_player_id');
    }

    public function loser()
    {
        return $this->belongsTo(Player::class, 'loser_player_id');
    }

    public function walkoverPlayer()
    {
        return $this->belongsTo(Player::class, 'walkover_player_id');
    }

    public function result()
    {
        return $this->hasOne(MatchResult::class, 'match_id');
    }
}