<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    //
    protected $fillable = ['nome', 'cover', 'user_id'];

    public function seasons() {
        return $this->hasMany(Season::class);
    }

    public function episodes() {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    public function numberOfWatchedEpisodes(): int {
        return $this->episodes
            ->filter(function ($episode) {
                return $episode->watched;
            })
            ->count();
    }

    public function percentageOfWatchedEpisodes():float {
        $this->episodes->count() > 0
            ? $percentage = ($this->numberOfWatchedEpisodes()*100)/$this->episodes->count()
            : $percentage = 0;
        $percentageRound = round($percentage, 0);
        return $percentageRound;
    }

    // Não funcionou
    protected static function booted() {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }

    public function isComplete():bool {
        return (($this->numberOfWatchedEpisodes()/$this->episodes->count()) === 1)
        ? true
        : false;
    }

}
