<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsGames extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->belongsTo(Game::class, 'games_id');
    }
}
