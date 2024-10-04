<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'studio'];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'game_genres')->withTimestamps();
    }
}
