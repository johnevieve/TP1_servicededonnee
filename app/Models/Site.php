<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'domaine',
        'description',
    ];

    public static function find(int|string $domaine)
    {
        return Site::where('domaine', $domaine)->first();
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
