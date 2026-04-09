<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_id',
        'category_id',
        'name',
        'start_date',
        'end_date',
        'status',
        'config_snapshot_json',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'config_snapshot_json' => 'array',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registrations()
    {
        return $this->hasMany(TournamentRegistration::class);
    }

    public function matches()
    {
        return $this->hasMany(MatchModel::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }

    public function rankingPoints()
    {
        return $this->hasMany(RankingPoint::class);
    }
}