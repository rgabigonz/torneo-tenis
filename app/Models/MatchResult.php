<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'set_games_p1',
        'set_games_p2',
        'has_super_tiebreak',
        'super_tiebreak_p1',
        'super_tiebreak_p2',
        'entered_by_player_id',
        'confirmed_by_player_id',
        'admin_validated_by_user_id',
        'validation_status',
        'comments',
    ];

    protected $casts = [
        'has_super_tiebreak' => 'boolean',
    ];

    public function match()
    {
        return $this->belongsTo(MatchModel::class, 'match_id');
    }

    public function enteredByPlayer()
    {
        return $this->belongsTo(Player::class, 'entered_by_player_id');
    }

    public function confirmedByPlayer()
    {
        return $this->belongsTo(Player::class, 'confirmed_by_player_id');
    }

    public function adminValidatedBy()
    {
        return $this->belongsTo(User::class, 'admin_validated_by_user_id');
    }
}