<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
        'start_date',
        'end_date',
        'competitie_id',
        'winaar',
    ];

    public function competitie()
    {
        return $this->belongsTo(Competitie::class);
    }

    public function winaar()
    {
        return $this->belongsTo(Team::class, 'winaar');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'gameinfo')->withPivot('goals');
    }
}
