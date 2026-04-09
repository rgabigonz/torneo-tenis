<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'club_member_number',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registrations()
    {
        return $this->hasMany(TournamentRegistration::class);
    }

    public function matchesAsPlayer1()
    {
        return $this->hasMany(MatchModel::class, 'player1_id');
    }

    public function matchesAsPlayer2()
    {
        return $this->hasMany(MatchModel::class, 'player2_id');
    }

    public function enteredResults()
    {
        return $this->hasMany(MatchResult::class, 'entered_by_player_id');
    }

    public function confirmedResults()
    {
        return $this->hasMany(MatchResult::class, 'confirmed_by_player_id');
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }

    public function rankingPoints()
    {
        return $this->hasMany(RankingPoint::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}