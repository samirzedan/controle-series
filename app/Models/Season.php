<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    protected $fillable = ['number'];

    public function series() {
        return $this->belongsTo(Series::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
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
        $percentageRound = round($percentage, 2);
        return $percentageRound;
    }

    public function isComplete():bool {
        return (($this->numberOfWatchedEpisodes()/$this->episodes->count()) === 1)
        ? true
        : false;
    }
}
